<?php get_header(); ?>
<div class="padding row" style="background-color: #F0F0F0">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 class="fw-bold"><span style="color: #005EAA">Simulador </span> de pensión IMSS</h1>
        <p class="fw-bold">Calcula tu pensión estimada en minutos</p>
        <p>El simulador de pensión IMSS te permite estimar cuánto recibirías al jubilarte según tu régimen, edad,
            semanas cotizadas y salario.
            <br><br>
            Recuerda que este simulador ofrece una estimación, pero no considera estrategias destinadas a potenciar el valor de tu
            pensión.
        </p>
    </div>
    <div class="col-lg-6 text-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/Group154.png" class="person-img">
    </div>
</div>

<div class="padding d-flex flex-column flex-md-row justify-content-between">
    <div class="col-md-6">
       <!--<h3 class="fw-bold">Selecciona tu simulador</h3>
        <ul>
            <li>Ley 73: Usa la herramienta Mi Pensión Digital del IMSS.</li>
            <li>Ley 97: Utiliza la calculadora CONSAR.</li>
        </ul>
        <div class="row justify-content-evenly">
            <button class="btn1 col-5" id="ley73">Ley 73</button>
            <button class="btn2 col-5" id="ley97">Ley 97</button>
        </div>-->

        <!--form para ley 73--->
        <div id="info-ley73" class="mt-3">
            <p class="fw-bold">Mi Pensión IMSS</p>
            <ul>
                <li>Si comenzaste a cotizar antes del 1° de julio de 1997, este es tu simulador.</li>
                <li>El sistema calcula tu pensión considerando Cesantía en Edad Avanzada (60–64 años) o Vejez (65 años).
                </li>
            </ul>
            <p class="fw-bold">Ingresa tus datos</p>
            <form action="" id="form-ley73" novalidate>
			  <div class="row mb-2">
				<div class="col-md-5">
				  <label for="edad" class="fw-bold">Edad</label>
				</div>
				<div class="col-md-7">
				  <input id="edad" name="edad" type="number" inputmode="numeric" placeholder="Ingresa tu edad" required min="60" max="99" step="1" />
				  <div class="invalid-feedback d-block" style="display:none;"></div>
				</div>
			  </div>

			  <div class="row mb-2">
				<div class="col-md-5">
				  <label for="semanas" class="fw-bold">Semanas cotizadas reconocidas por el IMSS</label>
				</div>
				<div class="col-md-7">
				  <input id="semanas" name="semanas" type="number" inputmode="numeric" placeholder="Ingresa el total de semanas cotizadas" required min="500" max="3000" step="1"/>
				  <div class="invalid-feedback d-block" style="display:none;"></div>
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-5">
				  <label for="salario" class="fw-bold">Salario promedio de los últimos 5 años</label>
				</div>
				<div class="col-md-7">
				  <input id="salario" name="salario" type="number" inputmode="numeric" placeholder="Ingresa tu salario" required min="9582" max="89204" step="1" />
				  <small class="text-muted d-block mt-1">Rango permitido: 9,582 a 89,204 (enteros)</small>
				  <div class="invalid-feedback d-block" style="display:none;"></div>
				</div>
			  </div>

			  <div class="row mt-3">
				<div class="col-md-7 offset-md-5">
				  <button type="submit" class="btn btn-primary">Calcular</button>
				</div>
			  </div>
			</form>
        </div>

        <!--form para ley 97--->
        <!--<div id="info-ley97" class="mt-3">
            <p class="fw-bold">Calculadora CONSAR</p>
            <ul>
                <li>Si comenzaste a cotizar a partir del 1° de julio de 1997, este es tu simulador.</li>
            </ul>
            <p class="fw-bold">Ingresa tus datos</p>
            <form action="" id="form-ley97">
                <div class="row mb-2">
                    <div class="col-md-5">
                        <label for="salario" class="fw-bold">Salario diario</label>
                    </div>
                    <div class="col-md-7">
                        <input id="salario" name="salario" type="number" inputmode="numeric" placeholder="Ingresa tu salario" required min="315" max="2932" step="1" />
				  <small class="text-muted d-block mt-1">Rango permitido: 315 a 2,932 (enteros)</small>
				  <div class="invalid-feedback d-block" style="display:none;"></div>
                    </div>
                </div>
                <div class="row mt-3">
    				<div class="col-md-7 offset-md-5">
    				  <button type="submit" class="btn btn-primary">Calcular</button>
    				</div>
			  </div>
            </form>
        </div>-->
    </div>

    <div class="col-md-6 ps-1 ps-sm-5">
        <div class="d-flex justify-content-center">
            <div class="resultado" id="resultado-block">
                <h3 class="fw-bold text-white">Resultado aproximado</h3>
                <div id="resultado-monto" class="fw-bold text-white">
                  <span class="resultado-73">$ ---- MXN</span>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            
             <p class="fw-bold mb-0">Limitaciones: </p>
        <ul>
            <li>No refleja semanas faltantes ni periodos que necesiten aclaración.</li>
            <li>No incluye el impacto de estrategias como Modalidad 40 o Trabajador Independiente.</li>
            <li>Es solo una proyección base: el monto real puede variar. Corresponde al IMSS hacer el cálculo oficial del monto de pensión a recibir.</li>
        </ul>
        </div>

       
    </div>
</div>

<div class="bg-home d-flex flex-column flex-lg-row">
    <div class="col-lg-6 text-start ps-0 ps-sm-5 d-flex flex-column justify-content-center">
        <h2 class="fw-bold text-white"><span style="color: #D4AF37">Cómo mejorar el resultado</span> de tu pensión IMSS</h2>
        <p class="text-white fw-bold">Este simulador da un cálculo base, pero puedes aumentar tu pensión con estrategias como:</p>
        <ul class="text-white">
            <li>Regularizar semanas faltantes en tu historial.</li>
            <li>Elevar tu salario base con la Modalidad 40 (Ley 73).</li>
            <li>Realizar aportaciones voluntarias a tu AFORE (Ley 97).</li>
            <li>Cotizar durante más tiempo al IMSS.</li>
        </ul>
    </div>
    <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/sim.png" class="person-img">
    </div>
</div>


<div class="padding" style="background-color: #F0F0F0">
    <h2 class="fw-bold">Preguntas frecuentes sobre<span style="color: #005EAA"> el simulador de pensión IMSS</span></h2>
    <div class="accordion mx-3 mx-md-5" id="faq">
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      ¿Este simulador de Pensión IMSS es exacto?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse rounded-4" aria-labelledby="headingTwo"
                data-bs-parent="#faq">
                <div class="accordion-body">
                   <p>Si la información de la edad, número de semanas cotizadas y salario promedio es correcta, este simulador genera una estimación muy cercana al cálculo del IMSS. Esta proyección no contempla aspectos como: correcciones de semanas, vigencia de derechos o estrategias como Modalidad 40, por lo que este cálculo podría diferir del monto final de la pensión.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     ¿Qué necesito para usar el simulador de la Ley 73?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse rounded-4" aria-labelledby="headingThree"
                data-bs-parent="#faq">
                <div class="accordion-body">
                    <p>Edad, semanas cotizadas reconocidas por el IMSS y salario promedio de los últimos 5 años.</p>
                </div>
            </div>
        </div>
        <!--<div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                     ¿Qué necesito para usar la calculadora CONSAR de Ley 97?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse rounded-4" aria-labelledby="headingFour"
                data-bs-parent="#faq">
                <div class="accordion-body">
                    <p>Tu saldo en la AFORE, salario, fecha de nacimiento, año de afiliación al IMSS, género,  semanas cotizadas y edad de retiro.</p>
                </div>
            </div>
        </div>-->
    </div>
</div>

<div class="bg-home d-flex flex-column flex-lg-row">
    <div class="col-lg-6 text-start ps-0 ps-sm-5 d-flex flex-column justify-content-center">
        <h2 class="fw-bold text-white">Asesores en pensiones IMSS <span style="color: #D4AF37">con experiencia comprobada</span></h2>
        <ul class="text-white">
            <li>Más de 20 años ayudando a trabajadores en Ley 73 y Ley 97. </li>
            <li>Modelo analítico único que integra escenarios reales.</li>
            <li>Casos de éxito con incrementos considerables frente a lo estimado en simuladores oficiales.</li>
        </ul>
    </div>
    <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/image39.png" class="person-img">
    </div>
</div>

<div class="padding text-center" style="background-color: #E5E7EB">
    <h2 class="fw-bold"><span style="color: #005EAA">¿Quieres un cálculo real</span> y no solo un estimado?</h2>
    <p><span class="fw-bold">Solicita tu análisis personalizado y recibe un reporte detallado</span> <br class="d-none d-lg-block">  con proyecciones claras y las estrategias idóneas para maximizar tu pensión.</p>
    <p class="mt-4">
        <a href="<?php echo get_bloginfo("url")?>/contacto/" class="cta"> Agenda tu sesión</a>
    </p>
    
</div>

<?php get_footer(); ?>