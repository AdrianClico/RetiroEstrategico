<?php get_header(); ?>
<div class="padding row" style="background-color: #F0F0F0">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 class="fw-bold"><span style="color: #005EAA">Calculadora </span> Modalidad 40</h1>
        <p class="fw-bold">Conoce el costo de la Modalidad 40 en segundos</p>
        <p>La Modalidad 40 del IMSS es una de las herramientas más poderosas para mejorar tu pensión. Una de las preguntas más frecuentes es: ¿cuánto voy a pagar por usar esta modalidad?
            <br><br>
            Con nuestra Calculadora de Modalidad 40, puedes saber de forma inmediata y gratuita cuánto te costaría cotizar con el salario base de cotización que tú elijas.
        </p>
    </div>
    <div class="col-lg-6 text-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/Group154.png" class="person-img">
    </div>
</div>

<div class="padding d-flex flex-column flex-md-row justify-content-between">
    <div class="col-md-6">
        <!--form para modalidad 40--->
        <div id="info-ley73" class="mt-3">
            <p class="fw-bold">Cómo utilizar la Calculadora</p>
            <p>Solo ingresa el salario diario con el que deseas darte de alta y la calculadora te mostrará automáticamente:</p>
            <ul>
                <li>El costo en un mes de 28 días</li>
                <li>El costo en un mes de 30 días</li>
                <li>El costo en un mes de 31 días</li>
                <li>El costo anual estimado (12 meses)</li>
            </ul>
            <p>No necesitas registrarte, dejar tus datos ni esperar días a recibir los resultados. El cálculo es gratuito y se genera al instante.</p>
            <p class="fw-bold">Ingresa tus datos</p>
            <form action="" id="form-mod40" novalidate>
			    <div class="row mb-2">
                    <div class="col-md-5">
                        <label for="salario" class="fw-bold">Salario diario</label>
                    </div>
                    <div class="col-md-7">
                        <input id="salario" name="salario" type="number" inputmode="numeric" placeholder="Ingresa tu salario" required min="315" max="2932" step="1" />
                        <small class="text-muted d-block mt-1">Rango permitido: 315 a 2,932 (enteros)</small>
                        <div class="invalid-feedback d-block" style="display:none;">
                            
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-7 offset-md-5">
                        <button type="submit" class="btn btn-primary">Calcular</button>
    				</div>
    			</div>
			</form>
        </div>
    </div>

    <div class="col-md-6 ps-1 ps-sm-5">
        <div class="d-flex justify-content-center">
            <div class="resultado" id="resultado-block">
                <div id="resultado-monto" class="fw-bold text-white">
                    <div class="resultado-mod40">
                        <div class="mod40-title">Cuotas Mensuales</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Mes de 28 días</td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <td>Mes de 30 días</td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <td>Mes de 31 días</td>
                                    <td>---</td>
                                </tr>
                            </tbody>
                        </table>
                
                        <div class="mod40-title">Cuota Anual</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Año completo</td>
                                    <td>---</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <p class="fw-bold mb-0">Limitaciones: </p>
        <ul>
            <li>Estos costos son estimados. Corresponde al IMSS hacer el cálculo oficial del monto a pagar.</li>
            <li>El costo que muestra nuestra Calculadora de Modalidad 40 es válido sólo para 2026. Recuerda que dicho costo se incrementa año con año.</li>
        </ul>
        </div>

        
    </div>
</div>

<div class="bg-home d-flex flex-column flex-lg-row">
    <div class="col-lg-6 text-start ps-0 ps-sm-5 d-flex flex-column justify-content-center">
        <h2 class="fw-bold text-white"><span style="color: #D4AF37">Ventajas de usar nuestra Calculadora de </span>Modalidad 40</h2>
        <ul class="text-white">
            <li>Te permite evaluar si la Modalidad 40 es viable para tu presupuesto.</li>
            <li>Te ayuda a comparar distintos escenarios de costos antes de tomar una decisión.</li>
            <li>Evita sorpresas y errores comunes al planear tu retiro.</li>
            <li>Es el primer paso para diseñar tu estrategia de pensión.</li>
        </ul>
    </div>
    <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/sim.png" class="person-img">
    </div>
</div>


<div class="padding" style="background-color: #F0F0F0">
    <h2 class="fw-bold">Preguntas frecuentes sobre<span style="color: #005EAA"> Modalidad 40 IMSS</span></h2>
    <div class="accordion mx-3 mx-md-5" id="faq">
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header rounded-4" id="headingOne">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    ¿Qué es la Modalidad 40 del IMSS?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show rounded-4" aria-labelledby="headingOne"
                data-bs-parent="#faq">
                <div class="accordion-body">
                   <p> Es la Continuación Voluntaria al Régimen Obligatorio, un esquema que permite seguir cotizando en el IMSS después de una baja laboral. Está diseñada para que continues aumentando tus semanas de cotización y eleves tu salario promedio de cotización, con lo cual puedes incrementar tu pensión bajo la Ley 73.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     ¿Cuáles son los requisitos para contratar la Modalidad 40?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse rounded-4" aria-labelledby="headingTwo"
                data-bs-parent="#faq">
                <div class="accordion-body">
                   <ul>
                        <li>Estar dado de baja en el IMSS como trabajador activo.</li>
                        <li>Tener al menos 52 semanas cotizadas en los últimos 5 años.</li>
                        <li>Inscribirte dentro de los 5 años posteriores a tu baja.</li>
                        <li>Elegir un salario de cotización entre tu último salario registrado y hasta 25 UMAs.</li>
                   </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    ¿Cuánto cuesta la Modalidad 40 y cómo se pagan las aportaciones?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse rounded-4" aria-labelledby="headingThree"
                data-bs-parent="#faq">
                <div class="accordion-body">
                    <p>El costo equivale al 14.438% del salario base de cotización que elijas, con tope de 25 UMAs. Mientras mayor sea el salario que declares, mayor será tu aportación mensual y tu futura pensión.
                        <br>
                    El pago se realiza en línea (vía transferencia bancaria) o en ventanilla bancaria utilizando los recordatorios de pago emitidos por el IMSS.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ¿Qué beneficios ofrece la Modalidad 40?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse rounded-4" aria-labelledby="headingFour"
                data-bs-parent="#faq">
                <div class="accordion-body">
                    <ul>
                        <li>Aumenta tus semanas cotizadas.</li>
                        <li>Puede elevar tu salario promedio de las últimas 250 semanas.</li>
                        <li>Mantienes vigentes tus derechos para acceder a pensión.</li>
                        <li>Incrementa el ahorro en tu cuenta AFORE.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item rounded-4 border-0 mt-3">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                     ¿Existe la Modalidad 40 retroactiva?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse rounded-4" aria-labelledby="headingFive"
                data-bs-parent="#faq">
                <div class="accordion-body">
                    <p>Si es posible cubrir cuotas de meses anteriores a la fecha de inscripción. No obstante, esto sólo se puede realizar cuando se contrata la Modalidad 40 de manera presencial en la subdelegación del IMSS.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-home d-flex flex-column flex-lg-row">
    <div class="col-lg-6 text-start ps-0 ps-sm-5 d-flex flex-column justify-content-center">
        <h2 class="fw-bold text-white">La información correcta, en el momento correcto, <span style="color: #D4AF37">puede hacer toda la diferencia en tu retiro.</span></h2>
        <p class="text-white">
            En Retiro Estratégico estamos convencidos de que el primer paso para planear el retiro es contar con información clara, honesta y completa. Saber lo que tienes que pagar por utilizar la Modalidad 40 es un primer paso. El siguiente paso es contar con nuestras estrategias, hechas a tu medida por nuestro personal experto en el tema de pensiones.
        </p>
    </div>
    <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <img src="<?php echo get_bloginfo("stylesheet_directory")?>/assets/img/image39.png" class="person-img">
    </div>
</div>

<div class="padding text-center" style="background-color: #E5E7EB">
    <h2 class="fw-bold"><span style="color: #005EAA">¿Quieres una estrategia efectiva</span> para maximizar tu pensión, utilizando la Modalidad 40?</h2>
    <p><span class="fw-bold">Solicita tu análisis y recibe tu plan de pensión personalizado</span> <br class="d-none d-lg-block"> con proyecciones claras y las mejores estrategias para lograr la pensión que mereces.</p>
    <p class="mt-4">
        <a href="<?php echo get_bloginfo("url")?>/contacto/" class="cta"> Agenda tu sesión</a>
    </p>
    
</div>

<?php get_footer(); ?>