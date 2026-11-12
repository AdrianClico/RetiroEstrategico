(function () {
  const ENDPOINT_73 = "https://apiv2.clico.com.mx/api/retiro_estrategico/simuladorLey73";
  const ENDPOINT_97 = "https://apiv2.clico.com.mx/api/retiro_estrategico/simuladorLey97";

  const SALARIO73_MIN = 9582;
  const SALARIO73_MAX = 89204;

  const SALARIO97_MIN = 315;
  const SALARIO97_MAX = 2932;

  // ===== Scroll al bloque de resultado =====
  function scrollToResultado() {
    const $target = $(".resultado").first();
    if (!$target.length) return;

    const offset = 90;
    $("html, body").animate({ scrollTop: $target.offset().top - offset }, 450);
  }

  // ===== Helpers de resultado =====
  function resetSimulador() {
    // Limpia resultado (borra tabla o monto y deja placeholder)
    $("#resultado-monto")
    .empty()
    .html(`<span class="resultado-73">$ ---- MXN</span>`);

    // Limpia mensajes
    $("#msg").hide().empty();

    // Limpia formularios
    $("#form-ley73")[0]?.reset();
    $("#form-ley97")[0]?.reset();

    $("#form-ley73, #form-ley97")
    .find(".is-invalid, .is-valid")
    .removeClass("is-invalid is-valid");

    $(".invalid-feedback").hide().empty();
  }
  
  function fmtInt(n) {
    const num = Number(n);
    if (!Number.isFinite(num)) return "----";
    return num.toLocaleString("es-MX", { maximumFractionDigits: 0 });
  }

  // Ley 73
  function renderResultado73(monto) {
    const $el = $("#resultado-monto");
    if (!Number.isFinite(Number(monto))) {
      $el.html(`<span class="resultado-73">$ ---- MXN</span>`);
      return;
    }
    const n = Number(monto);
    $el.html(
      `<span class="resultado-73">$ ${n.toLocaleString("es-MX", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      })} MXN</span>`
    );
  }

  // Ley 97 
  function renderResultado97(resp) {
    const $el = $("#resultado-monto");

    const html = `
      <div class="resultado-ley97">
      <div class="ley97-title">Cuotas Mensuales</div>
        <table>
          <tbody>
            <tr>
              <td>Mes de 28 días</td>
              <td>${fmtInt(resp.mensual_28)}</td>
            </tr>
            <tr>
              <td>Mes de 30 días</td>
              <td>${fmtInt(resp.mensual_30)}</td>
            </tr>
            <tr>
              <td>Mes de 31 días</td>
              <td>${fmtInt(resp.mensual_31)}</td>
            </tr>
          </tbody>
        </table>

        <div class="ley97-title">Cuota Anual</div>

        <table>
          <tbody>
            <tr>
              <td>Año completo</td>
              <td>${fmtInt(resp.anual)}</td>
            </tr>
          </tbody>
        </table>
      </div>
    `;

    $el.html(html);
  }

  function showMsg(type, html) {
    const $msg = $("#msg");
    if (!$msg.length) return;
    $msg.removeClass().addClass(`alert alert-${type}`).html(html).hide().fadeIn();
  }

  function blockForm($form, blocked) {
    const $btn = $form.find('button[type="submit"], #enviar').first();
    const $spin = $("#msg-enviar");
    $btn.prop("disabled", blocked);
    if ($spin.length) blocked ? $spin.show() : $spin.hide();
  }

  // ===== Toggle + clases btn1/btn2 =====
  $(document).ready(function () {
    $("#info-ley97").hide();

    function activarBoton($activo, $inactivo) {
      $activo.removeClass("btn2").addClass("btn1");
      $inactivo.removeClass("btn1").addClass("btn2");
    }

    $("#ley73").on("click", function (e) {
      e.preventDefault();
      activarBoton($("#ley73"), $("#ley97"));
      resetSimulador();
      $("#info-ley97").hide();
      $("#info-ley73").slideDown();
    });

    $("#ley97").on("click", function (e) {
      e.preventDefault();
      activarBoton($("#ley97"), $("#ley73"));
      resetSimulador();
      $("#info-ley73").hide();
      $("#info-ley97").slideDown();
    });
  });

  // ===== Validate method =====
  $.validator.addMethod(
    "entero",
    function (value, element) {
      if (this.optional(element)) return true;
      return /^[0-9]+$/.test(String(value));
    },
    "Ingresa solo números enteros"
  );

  $(document).on("wheel", "input[type=number]", function () {
    this.blur();
  });

  $("#form-ley73, #form-ley97").on("input", "input[type=number]", function () {
    this.value = this.value.replace(/[^\d]/g, "");
  });

  // ===== Ley 73 =====
  $("#form-ley73").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    errorPlacement: function (error, element) {
      const feedback = element.closest(".col-md-7").find(".invalid-feedback");
      if (feedback.length) feedback.html(error).show();
      else error.insertAfter(element);
    },
    success: function (_label, element) {
      const feedback = $(element).closest(".col-md-7").find(".invalid-feedback");
      if (feedback.length) feedback.hide().empty();
    },
    highlight: (el) => $(el).addClass("is-invalid").removeClass("is-valid"),
    unhighlight: (el) => $(el).removeClass("is-invalid").addClass("is-valid"),

    rules: {
      edad: { required: true, entero: true, min: 60, max: 99 },
      semanas: { required: true, entero: true, min: 500, max: 3000 },
      salario: { required: true, entero: true, min: SALARIO73_MIN, max: SALARIO73_MAX },
    },

    submitHandler: function (form, event) {
      event.preventDefault();
      const $form = $(form);

      const payload = {
        edad: parseInt($form.find('input[name="edad"]').val(), 10),
        semanas: parseInt($form.find('input[name="semanas"]').val(), 10),
        salario: parseInt($form.find('input[name="salario"]').val(), 10),
      };

      blockForm($form, true);
      showMsg("info", "Calculando...");

      $.ajax({
        url: ENDPOINT_73,
        method: "POST",
        data: $.param(payload),
        dataType: "json",
        timeout: 20000,
        success: function (resp) {
          if (resp && typeof resp.status !== "undefined") {
            renderResultado73(resp.monto_final);
            showMsg("success", "Cálculo realizado con éxito.");
            scrollToResultado();
          } else {
            renderResultado73(null);
            showMsg("warning", "No fue posible calcular la pensión. Intenta nuevamente.");
            scrollToResultado();
          }
        },
        error: function (xhr) {
          renderResultado73(null);
          let detalle = "Ha ocurrido un error al procesar la solicitud.";
          if (xhr?.responseJSON?.error || xhr?.responseJSON?.message) {
            detalle = xhr.responseJSON.error || xhr.responseJSON.message;
          }
          showMsg("danger", detalle);
          scrollToResultado();
        },
        complete: function () {
          blockForm($form, false);
        },
      });
    },
  });

  // ===== Ley 97 =====
  $("#form-ley97").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    errorPlacement: function (error, element) {
      const feedback = element.closest(".col-md-7").find(".invalid-feedback");
      if (feedback.length) feedback.html(error).show();
      else error.insertAfter(element);
    },
    success: function (_label, element) {
      const feedback = $(element).closest(".col-md-7").find(".invalid-feedback");
      if (feedback.length) feedback.hide().empty();
    },
    highlight: (el) => $(el).addClass("is-invalid").removeClass("is-valid"),
    unhighlight: (el) => $(el).removeClass("is-invalid").addClass("is-valid"),

    rules: {
      salario: { required: true, entero: true, min: SALARIO97_MIN, max: SALARIO97_MAX },
    },

    submitHandler: function (form, event) {
      event.preventDefault();
      const $form = $(form);

      const payload = {
        salario: parseInt($form.find('input[name="salario"]').val(), 10),
      };

      blockForm($form, true);
      showMsg("info", "Calculando...");

      $.ajax({
        url: ENDPOINT_97,
        method: "POST",
        data: $.param(payload),
        dataType: "json",
        timeout: 20000,
        success: function (resp) {
          if (resp && typeof resp.status !== "undefined") {
            renderResultado97(resp); 
            showMsg("success", "Cálculo realizado con éxito.");
            scrollToResultado();
          } else {
            renderResultado73(null);
            showMsg("warning", "No fue posible calcular la pensión. Intenta nuevamente.");
            scrollToResultado();
          }
        },
        error: function (xhr) {
          renderResultado73(null);
          let detalle = "Ha ocurrido un error al procesar la solicitud.";
          if (xhr?.responseJSON?.error || xhr?.responseJSON?.message) {
            detalle = xhr.responseJSON.error || xhr.responseJSON.message;
          }
          showMsg("danger", detalle);
          scrollToResultado();
        },
        complete: function () {
          blockForm($form, false);
        },
      });
    },
  });
})();
