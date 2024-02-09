@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #041E42; color: #fff;">
      <button type="button" class="btn btn-sm btn-info" id="btnMascota"><i class="mdi mdi-plus-box"></i> Agregar Mascota</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mascota" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Imagen</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre Mascota</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Edad</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Tipo Mascota</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Raza</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
            </tr>
          </thead>
        </table>
        </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="MascotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #041E42">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Ingrese su mascota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => 'mascota.store', 'method' => 'POST','id' => 'FormMascota', 'files' => true]) !!}
            <div class="form-row">
              <div class="col-md-6 mb-16">
            <div class="form-group">
                <label for="inputPassword3">Tipo</label>
                <select name="tipo_mascota" id="tipomascota" class="form-control">
                    <option value="0">--Seleccione Tipo--</option>
                      @foreach($tipos as $tipo)
                             <option value="{{ $tipo->id }}"> {{ $tipo->descripcion }} </option>
                      @endforeach
                 </select>
              </div>
              </div>
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Nombre de Mascota</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Raza</label>
                    <input type="text" class="form-control" name="raza" id="raza">
                </div>
              </div>
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad" onkeypress="return numeros(event)" maxlength="4" placeholder="1.5">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Sexo</label>
                  <select class="form-control" name="genero" id="genero">
                    <option value="0">--Seleccione Sexo--</option>
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Enfermedades Pre existentes</label>
                  <textarea  class="form-control" name="enfermedad" id="enfermedad"></textarea>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                  <div class="form-group">
                    <label for="inputPassword3">Peso</label>
                    <input type="text" class="form-control" name="peso" id="peso" maxlength="4" placeholder="1.5">
                  </div>
                </div>
                <div class="col-md-6 mb-16">
                  <div class="form-group">
                    <label for="inputPassword3">Esterilizado</label>
                    <select class="form-control" name="esterilizado" id="esterilizado">
                      <option value="0">--Seleccione Opción--</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
            </div>

              <div class="form-group">
                <label for="inputPassword3">Foto</label>
                <input type="file" class="form-control-file" name="foto" id="foto">
              </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" id="IngresarMascota">Guardar</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@include('mascota.edit')
@include('mascota.historial')
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
        $('.mascota').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'processing' : true,
    		'serverSide' : true,
    		'ajax' : '/mascota/table',
    		'columns' : [
    			{data: 'imagen', name: 'imagen'},
    			{data: 'nombre', name: 'nombre'},
    			{data: 'edad', name: 'edad'},
                {data: 'tipo.descripcion', name: 'tipo.descripcion'},
                {data: 'raza', name: 'raza'},
    	        {data: 'acciones', name: 'acciones',orderable: false, searchable: false},

    		]

		});
    $('.mascota').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });


        $('#btnMascota').on('click', function(e) {
            e.preventDefault();
            $('#MascotaModal').modal({backdrop: 'static', keyboard: false, show: true});
        });
    
        $('#IngresarMascota').on('click', function(e) {
            e.preventDefault();
    
            var Tipo = $("#tipomascota").val();
            var Nombre = $("#nombre").val();
            /*var Edad = $("#edad").val();
            var Raza = $("#raza").val();
            var Peso = $("#peso").val();
            var Enfermedad = $("#enfermedad").val(); */
            
    
            
            if($('#tipomascota').val()==0)
            {
            toastr.error('Ingrese un tipo', 'Error!', {timeOut: 3000})
            return false;
            }
            if(Nombre === '')
            {
                toastr.error('Ingrese el nombre', 'Error!', {timeOut: 3000})
                return false;
            }
           /* if(Edad === '')
            {
                toastr.error('Ingrese la edad', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Raza === '')
            {
                toastr.error('Ingrese la Aprazaellido ', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Peso === '')
            {
                toastr.error('Ingrese el peso ', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Enfermedad === '')
            {
                toastr.error('Complete para llenar la ficha ', 'Error!', {timeOut: 3000})
                return false;
            }
            if($('#genero').val()==0)
            {
            toastr.error('Ingrese un Género', 'Error!', {timeOut: 3000})
            return false;
            }
            if($('#esterilizado').val()==0)
            {
            toastr.error('Ingrese si esta Esterilizado', 'Error!', {timeOut: 3000})
            return false;
            } */
    
    
    
         var form = $('#FormMascota');
         var url = form.attr('action');
         var formData = new FormData($("#FormMascota")[0]);
         
    
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
                    swal("OK!", "Mascota Ingresada Correctamente!", "success")
                    .then((value) => {
                        $("#FormMascota")[0].reset();
                      location.reload();
                    });
                 }
              }
          });
    
    
         });
        });

    

        $('#foto').on("change", function() {
        var o = document.getElementById('foto');
        var foto = o.files[0];
        var c = 0;
        if (o.files.length == 0 || !(/\.(jpg|png|jpeg)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg/.png.!", "error")
            .then((value) => {
                $("#foto").val('');
            });
        }
        });



        $('#fotos').on("change", function() {
        var o = document.getElementById('fotos');
        var foto = o.files[0];
        var c = 0;
        if (o.files.length == 0 || !(/\.(jpg|png|jpeg|JPG)$/i).test(foto.name)) {
            c = 1;
            swal("ERROR!", "Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg/.png.!", "error")
            .then((value) => {
                $("#fotos").val('');
            });
        }
        });


var Editar = function(id)
{
  var ruta = "mascota/"+id+"/edit";
  $.get(ruta, function(data){
    $('#EditMascotaModal').modal({backdrop: 'static', keyboard: false, show: true}); 
    $('#tipomascotas  option[value="'+data.tipo_id+'"]').prop("selected", true);
    $('#nombres').val(data.nombre);
    $('#edades').val(data.edad);
    $('#razas').val(data.raza);
    $('#pesos').val(data.peso);
    $('textarea#enfermedades').val(data.enfermedades);
    $('#generos option[value="'+data.genero+'"]').prop("selected", true);
    $('#esterilizados option[value="'+data.esterilizado+'"]').prop("selected", true);
    $('#Imagen').html($("<img src="+ data.imagen + " class='img-fluid' width='200' height='200'></img>"));
    $('#carpeta').val(data.carpeta);
    $('#id_mascota').val(data.id);
  });
}





$('#EditarMascota').on('click', function(e) {
            e.preventDefault();
    
            var Tipo = $("#tipomascotas").val();
            var Nombre = $("#nombres").val();
            var Edad = $("#edades").val();
            var Raza = $("#razas").val();
            var id = $('#id_mascota').val();
            var url = "/mascota-edit";
            
    
            
            if($('#tipomascotas').val()==0)
            {
            toastr.error('Ingrese un tipo', 'Error!', {timeOut: 3000})
            return false;
            }
            if(Nombre === '')
            {
                toastr.error('Ingrese el nombre', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Edad === '')
            {
                toastr.error('Ingrese la edad', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Raza === '')
            {
                toastr.error('Ingrese la Aprazaellido ', 'Error!', {timeOut: 3000})
                return false;
            }
    
    
            
         var form = $('#FormEditMascota');
         var formData = new FormData($("#FormEditMascota")[0]);
         
    
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
                    swal("OK!", "Mascota Editada Correctamente!", "success")
                    .then((value) => {
                        $("#FormEditMascota")[0].reset();
                        $('.mascota').DataTable().ajax.reload();
                        //$('#EditMascotaModal').hide();
                        location.reload();
                    });
                 }
              }
          });
    
    
         });


         var Eliminar = function(id)
{
  swal({
  title: "Esta Seguro?",
  text: "Una vez eliminado, no podrá recuperar estos datos!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  	$.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
  		url: "mascota/"+id,
        type: 'DELETE',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {
              swal("OK!", "Mascota Eliminado Correctamente!", "success")
              .then((value) => {
                $('.mascota').DataTable().ajax.reload();
              });
           }
       },
          error: function (respuesta) {
            swal("Error!", "Error de conexion, intentelo más tarde.", "error");
          }

  	});
    } else {
  }
});
}


        function numeros(e){
        var tecla = e.keyCode;

            if (tecla==8 || tecla==9 || tecla==13){
                return true;
            }
                
            var patron =/[0-9]/;
            var tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
         </script>
@endsection