@extends('layouts.app')

@section('title', 'Turnero UVP')


@section('content')
<div class="container mt-5">
    <h2>Manual de uso</h2>
    
    <div class="accordion" id="manualAccordion">
      <!-- Sección Nuevo Día -->
      <div class="accordion-item">
          <h2 class="accordion-header" id="headingNuevoDia">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNuevoDia" aria-expanded="true" aria-controls="collapseNuevoDia">
                  Nuevo Día
              </button>
          </h2>
          <div id="collapseNuevoDia" class="accordion-collapse collapse show" aria-labelledby="headingNuevoDia" data-bs-parent="#manualAccordion">
              <div class="accordion-body">
                  <p>En la sección "Nuevo Día", puedes configurar los turnos para un nuevo día. Sigue los siguientes pasos:</p>
                  <ol>
                      <li>Haz clic en el botón "Nuevo Día".</li>
                      <li>Completa el formulario con los siguientes campos:
                          <ul>
                              <li><strong>Número de módulos abiertos:</strong> Ingresa la cantidad de módulos que estarán disponibles.</li>
                              <li><strong>Hora de inicio:</strong> Selecciona la hora en que los turnos comenzarán.</li>
                              <li><strong>Hora de cierre:</strong> Selecciona la hora en que los turnos finalizarán.</li>
                              <li><strong>Recesos:</strong> (Opcional) Indica los periodos de receso si los hay.</li>
                          </ul>
                      </li>
                      <li>Haz clic en el botón "Guardar Configuración" para salvar los cambios.</li>
                  </ol>
                  <p>En la vista previa del turno, se mostrará:</p>
                  <ul>
                      <li><strong>Nombre de la persona:</strong> El nombre del usuario que tiene el turno actual.</li>
                      <li><strong>Botón "Atendido":</strong> Para marcar el turno como atendido y pasar al siguiente.</li>
                      <li><strong>Indicador de turnos faltantes:</strong> Para mostrar cuántos turnos quedan.</li>
                      <li><strong>Información adicional relevante:</strong> Cualquier otra información importante.</li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- Sección Generar QR -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingGenerarQR">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenerarQR" aria-expanded="false" aria-controls="collapseGenerarQR">
                Generar QR
            </button>
        </h2>
        <div id="collapseGenerarQR" class="accordion-collapse collapse" aria-labelledby="headingGenerarQR" data-bs-parent="#manualAccordion">
            <div class="accordion-body">
                <p>En la sección "Generar QR", puedes generar un código QR que los alumnos pueden escanear para registrarse en la fila de espera. Sigue los siguientes pasos:</p>
                <ol>
                    <li>Haz clic en el botón "Generar QR".</li>
                    <li>El sistema generará un código QR que los alumnos pueden escanear.</li>
                    <li>Al escanear el código QR, los alumnos serán redirigidos a un formulario donde deben ingresar:
                        <ul>
                            <li><strong>Nombre del alumno:</strong> Ingresa el nombre del alumno.</li>
                            <li><strong>Datos adicionales necesarios:</strong> Completa cualquier otro dato requerido.</li>
                        </ul>
                    </li>
                    <li>Al completar el formulario, el alumno se añade automáticamente a la fila de espera.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Sección Pantalla de Visualización -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingPantallaVisualizacion">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePantallaVisualizacion" aria-expanded="false" aria-controls="collapsePantallaVisualizacion">
                Pantalla de Visualización
            </button>
        </h2>
        <div id="collapsePantallaVisualizacion" class="accordion-collapse collapse" aria-labelledby="headingPantallaVisualizacion" data-bs-parent="#manualAccordion">
            <div class="accordion-body">
                <p>La "Pantalla de Visualización" muestra la información de los turnos de manera pública. Aquí puedes ver:</p>
                <ul>
                    <li><strong>Turno actual:</strong> El turno que está siendo atendido.</li>
                    <li><strong>Nombre de la persona:</strong> El nombre del usuario que tiene el turno actual.</li>
                    <li><strong>Módulo asignado:</strong> El módulo donde se está atendiendo el turno.</li>
                    <li><strong>Próximos turnos:</strong> Información sobre los próximos turnos en la fila de espera.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection