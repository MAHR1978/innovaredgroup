@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
  </ol>
</nav>
<div class="content-box mt-20 fadeInUp animated">
    <div class="row no-gutters p-20 align-items-center">
        <div class="col-12 box-title">Ingreso de Atención</div>
    </div>
    <div class="px-20 pb-20">
        <form action="{{route('atencion.store')}}" method ="POST" id="FormAtencion" files="true">
        <input type="hidden" name="mascota_id" id="mascota_id" value="{{ $id_mascota }}">
        <input type="hidden" name="centro_id" id="centro_id" value="{{ $centro }}">
        <input type="hidden" name="id_hora" id="id_hora" value="{{ $id_hora }}">
        <input type="hidden" name="carpeta_mascota" id="carpeta_mascota" value="{{ $carpeta_mascota }}">
        <input type="hidden" name="nombre_mascota" id="nombre_mascota" value="{{ $nombre_mascota }}">
        <input type="hidden" name="duenio_id" id="duenio_id" value="{{ $id_duenio }}">

        <div class="card mb-10" style="border-color: #E0004D;">
            <div class="card-header" style="background-color: #808080; color: #fff;">Datos Dueño Mascota</div>
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
        <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Datos Mascota</div>
                <div class="card-body text-primary">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tipo Mascota</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $nombre_mascota }}" readonly>
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
                            <input type="text" class="form-control" id="inputEmail4" value="{{ $mascota->raza }}" readonly>
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
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Anamnesis</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="inputAddress">Ingrese Anamnesis</label>
                        <textarea class="form-control" name="sintomas" id="Sintoma" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Indicaciones Medicas </div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="inputAddress2">Ingrese Indicaciones Medicas </label>
                        <textarea class="form-control" name="diagnostico" id="Diagnostico" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="card mb-10" style="border-color: #E0004D;">
                <div class="card-header" style="background-color: #808080; color: #fff;">Tratamiento</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="inputAddress2">Ingrese Tratamiento a Seguir</label>
                        <textarea class="form-control" name="tratamiento" id="Tratamiento" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox mb-10">
                    <input type="checkbox" class="custom-control-input" name="necesitaexamen" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Adjuntar Examen o Recetas?</label>
                </div>
            </div>
            <!--<div class="card border-primary mb-10" id="SolicitudExamenes">
                <div class="card-header">Exámanes</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ingrese Imágenes</label>
                        <input type="file" class="form-control-file" name="solicitud[]" id="SolicitudExamen" multiple>
                      </div>
                </div>
            </div>-->
            <div class="card mb-10" style="border-color: #E0004D;" id="Examenes">
                <div class="card-header" style="background-color: #808080; color: #fff;">Exámen Visual o Recetas</div>
                <div class="card-body text-primary">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ingrese Exámen Visual o Recetas</label>
                        <input type="file" class="form-control-file" name="examen[]" id="Imagenes" multiple>
                      </div>
                </div>
            </div>
            <div class="form-row">
                
            </div>
            <div class="form-group">
                <!--<div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck"> Check me out </label>
                </div>-->
            </div>
            <button type="button" class="btn btn-primary" id="IngresarAtencion">Ingresar Atención</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {

        $('#Examenes').hide();
        $('#SolicitudExamenes').hide();

        $('#customCheck1').on('change', function() {
             if ($(this).is(':checked') ) {
                
                $('#Examenes').show();
                $('#SolicitudExamenes').show();
                
             } else {
                $('#Examenes').hide();
                $('#Imagenes').val('');
                $('#SolicitudExamenes').hide();
                $('#SolicitudExamen').val('');
                
            }
        });



        $('#IngresarAtencion').on('click', function(e) {
            e.preventDefault();

            var Sintoma = $("#Sintoma").val();
            var Diagnostico = $("#Diagnostico").val();
            var Tratamiento = $("#Tratamiento").val();
            var Raza = $("#raza").val();

            if(Sintoma === '')
            {
                toastr.error('Ingrese el o los sintomas', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Diagnostico === '')
            {
                toastr.error('Ingrese el diagnóstico', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Tratamiento === '')
            {
                toastr.error('Ingrese el Tratamiento ', 'Error!', {timeOut: 3000})
                return false;
            }

            var form = $('#FormAtencion');
            var url = form.attr('action');
            var formData = new FormData($("#FormAtencion")[0]);

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
                    swal("OK!", "Atención Ingresada Correctamente!", "success")
                    .then((value) => {
                        $("#FormAtencion")[0].reset();
                      window.location.href ='https://www.innovaredgroup.cl/testVet/public/horas';
                    });
                 }
              }
          });


        });

    });
</script>
@endsection