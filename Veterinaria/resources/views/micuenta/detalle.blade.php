@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
  </ol>
</nav>
<div class="content-box mt-20 fadeInUp animated">
    <div class="row no-gutters p-20 align-items-center">
        <div class="col-12 box-title">Detalle de atención</div>
    </div>
    <div class="px-20 pb-20">
        @if(Auth::user()->role == 'medico' || Auth::user()->role == 'admin')
        <div class="card mb-10" style="border-color: #E0004D;">
            <div class="card-header" style="background-color:#808080; color: #fff;">Datos Dueño Mascota</div>
                <div class="card-body text-primary">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Rut</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $usuario->rut }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nombre</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $user }}" readonly>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $usuario->email }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Dirección</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $usuario->direccion }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Teléfono</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $usuario->fono }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Datos Mascota</div>
                <div class="card-body text-primary">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tipo Mascota</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $tipo->descripcion }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mascota</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $nombre_mascota }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Edad</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $edad }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Raza</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $raza }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Sexo Mascota</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $mascota->genero }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Enfermedades Pre-existentes</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $mascota->enfermedades }}" readonly>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Peso Mascota</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $mascota->peso }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Esterilización</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $mascota->esterilizado }}" readonly>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group">
                            <img src="{{ '/'.$imagen }}" width="300px" height="150px">
                        </div>
                    </div>  
                </div>
            </div>
            @if(Auth::user()->role == 'paciente' || Auth::user()->role == 'admin')
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Atendido</div>
                <div class="card-body text-primary">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Atendido por:</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $user }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Centro Médico:</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $centro }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Anamnesis</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="inputAddress">Anamnesis</label>
                        <textarea class="form-control" name="sintomas" id="Sintoma" rows="6">{{ $sintomas }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Indicaciones Medicas</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="inputAddress2">Indicaciones Medicas</label>
                        <textarea class="form-control" name="diagnostico" id="Diagnostico" rows="6">{{ $diagnostico }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Tratamiento</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="inputAddress2">Ingrese Tratamiento a Seguir</label>
                        <textarea class="form-control" name="tratamiento" id="Tratamiento" rows="6">{{ $tratamiento }}</textarea>
                    </div>
                </div>
            </div>
            @if($examen == 1)
            <div class="card" style="border-color: #E0004D;" id="Examenes">
                <div class="card-header" style="background-color: #808080; color: #fff;">Exámen Visual</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <?php
                        $ruta = $carpeta_examenes;
                        $the_array = Array(); 
                        $handle = opendir($ruta); 
                        while (false !== ($file = readdir($handle))) { 
                           if ($file != "." && $file != "..") { 
                           $the_array[] = $file; 
                           } 
                        } 
                        closedir($handle); 
                        sort ($the_array); 
                        echo '<table class="table table-bordered table-striped table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Archivos Adjuntados</th>
                        </tr>
                      </thead>
                      <tbody>';
                        foreach($the_array as $val){ 
                           echo "<tr>
                                      <td>
                                        <img src=\"../../$ruta/$val\" width='80px' height='80px'>
                                        <i class='fa fa-file-archive-o'></i> <a href=\"../../$ruta/$val\" target='_blank'>$val</a></td>
                                    </tr>"; 
                        } 
                        echo ' </tbody>
                                  </table>';
                        ?>
                    </div>
                </div>
            </div>
            @endif
            <br>
            @if(Auth::user()->role == 'medico')
            {!! Form::open(['route' => 'archivo.upload', 'method' => 'POST','id' => 'FormUpload', 'files' => true]) !!}
            {!! Form::hidden('carpeta', $carpeta_examenes , ['id' => 'carpeta']) !!}
            <div class="card mb-10" style="border-color: #E0004D;" id="Examenes">
                <div class="card-header" style="background-color: #808080; color: #fff;">Exámen Visual o Recetas</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ingrese Exámen Visual o Recetas</label>
                        <input type="file" class="form-control-file" name="examen[]" id="Imagenes" multiple>
                      </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="SubirArchivo">Adjuntar</button>
            {!! Form::close() !!}
            @endif
            <div class="form-row">
                
            </div>
            <div class="form-group">
                <!--<div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck"> Check me out </label>
                </div>-->
            </div>
            
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {

        $('#SubirArchivo').on('click', function(e) {
            e.preventDefault();

            var Upload = $("#Imagenes").val();


            if(Upload === '')
            {
                toastr.error('Ingrese un Adjunto', 'Error!', {timeOut: 3000})
                return false;
            }

            var form = $('#FormUpload');
            var url = form.attr('action');
            var formData = new FormData($("#FormUpload")[0]);

            $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          type: 'POST',
          data: formData,
          cache:false,
          contentType: false,
          processData: false,
          dataType: 'JSON',
          success: function(respuesta) {
                if (respuesta.message == 'success') {
                    swal("OK!", "Adjunto Subido Correctamente!", "success")
                    .then((value) => {
                        $("#FormUpload")[0].reset();
                        location.reload();
                    });
                 }
              }
          });


        });
    });
</script>
@endsection