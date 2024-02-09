<!-- Modal -->
<div class="modal fade" id="DetalleEventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #041E42"> 
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Detalle de Hora</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Paciente</th>
                    <th scope="col">Veterinario</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th id="Paciente"></th>
                    <th id="Veterinario"></th>
                    <td id="Fecha"></td>
                    <td id="Hora"></td>
                    <td id="Status"></td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>