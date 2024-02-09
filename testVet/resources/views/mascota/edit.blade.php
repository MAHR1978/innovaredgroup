  <!-- Modal -->
  <div class="modal fade" id="EditMascotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #808080">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Editar su mascota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  id="FormEditMascota" method="POST" files="true">
              @csrf
              <input type="hidden" name="id_mascota" id="id_mascota" value="{{ false }}">
              <input type="hidden" name="carpeta" id="carpeta" value="{{ false }}">
            <div class="form-row">
              <div class="col-md-6 mb-16">
            <div class="form-group">
                <label for="inputPassword3">Tipo</label>
                <select name="tipo_mascota" id="tipomascotas" class="form-control">
                    <option value="0">--Seleccione Tipo--</option>
                      @foreach($tipos as $tipo)
                             <option value="{{ $tipo->id }}"> {{ $tipo->descripcion }} </option>
                      @endforeach
                 </select>
              </div>
              </div>
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Nombre Mascota</label>
                    <input type="text" class="form-control" name="nombre" id="nombres">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Raza</label>
                    <input type="text" class="form-control" name="raza" id="razas">
                </div>
              </div>
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edades" onkeypress="return numeros_edad(event)" maxlength="2">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Género</label>
                  <select class="form-control" name="genero" id="generos">
                    <option value="0">--Seleccione Género--</option>
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Enfermedades Pre existentes</label>
                  <textarea  class="form-control" name="enfermedad" id="enfermedades"></textarea>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                  <div class="form-group">
                    <label for="inputPassword3">Peso</label>
                    <input type="text" class="form-control" name="peso" id="pesos" onkeypress="return numeros(event)"   maxlength="2" placeholder="00.0">
                  </div>
                </div>
                <div class="col-md-6 mb-16">
                  <div class="form-group">
                    <label for="inputPassword3">Esterilizado</label>
                    <select class="form-control" name="esterilizado" id="esterilizados">
                      <option value="0">--Seleccione Opción--</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
            </div>

              <div class="form-group">
                <label for="inputPassword3">Foto</label>
                <input type="file" class="form-control-file" name="foto" id="fotos">
                <!--<small style="color: red">*La imagen debe ser de 620X347</small>-->
                <div id="Imagen"></div>
              </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" id="EditarMascota">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>