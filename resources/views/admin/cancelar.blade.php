<div class="modal fade" id="CancelarModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <div class="card" style="border-color: #E0004D;">
                    <div class="card-header" style="background-color: #041E42; color: #fff;">
                      Cancelando Hora
                    </div>
                    <div class="card-body">
                    <form action="{{route('cancelar.hora')}}" method="POST"id="FormCancelarHora">
                    <input type="hidden" name="id" id="id" value="{{ false }}">
                        <div class="form-group">
                            <label >Motivo Cancelación</label>
                            <textarea class="form-control" name="motivo" id="Motivo"></textarea>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="CancelarHora">Cancelar Hora</button>
            </div>
        </div>
    </div>
</div>