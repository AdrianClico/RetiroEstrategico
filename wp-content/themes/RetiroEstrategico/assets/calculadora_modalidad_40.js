(function () {
  const ENDPOINT_M40 = "https://apiv2.clico.com.mx/api/retiro_estrategico/calculadoraModalidad40";

  const SALARIO40_MIN = 315;
  const SALARIO40_MAX = 2932;

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
    $("#form-mod40")[0]?.reset();

    $("#form-mod40")
    .find(".is-invalid, .is-valid")
    .removeClass("is-invalid is-valid");

    $(".invalid-feedback").hide().empty();
  }
  
  function fmtInt(n) {
    const num = Number(n);
    if (!Number.isFinite(num)) return "----";
    return num.toLocaleString("es-MX", { maximumFractionDigits: 0 });
  }

  // Modaldidad 40
  function renderResultadoMod40(resp) {
    const $el = $("#resultado-monto");

    const html = `
      <div class="resultado-mod40">
      <div class="mod40-title">Cuotas Mensuales</div>
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

        <div class="mod40-title">Cuota Anual</div>

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

  $("#form-mod40").on("input", "input[type=number]", function () {
    this.value = this.value.replace(/[^\d]/g, "");
  });

  // ===== Modalidad 40 =====
  $("#form-mod40").validate({
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
      salario: { required: true, entero: true, min: SALARIO40_MIN, max: SALARIO40_MAX },
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
        url: ENDPOINT_M40,
        method: "POST",
        data: $.param(payload),
        dataType: "json",
        timeout: 20000,
        success: function (resp) {
          if (resp && typeof resp.status !== "undefined") {
            renderResultadoMod40(resp); 
            showMsg("success", "Cálculo realizado con éxito.");
            scrollToResultado();
          } else {
            showMsg("warning", "No fue posible realizar el cálculo. Intenta nuevamente.");
            scrollToResultado();
          }
        },
        error: function (xhr) {
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
