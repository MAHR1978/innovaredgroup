@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #808080; color: #fff;">
      <button type="button" class="btn btn-sm btn-info" id="btnMascota"><i class="mdi mdi-plus-box"></i> Agregar Mascota</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mascota" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #808080; color: #fff;">Imagen</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Nombre Mascota</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Edad</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Tipo Mascota</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Raza</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Acciones</th>
            </tr>
          </thead>

          <tbody>
          @foreach($mascota as $mascotas)
            <tr>           
              <td><img src="{{$mascotas->imagen}}" width="150px" heigth="150px"/></td>
              <td>{{$mascotas->nombre}}</td>
              <td>{{$mascotas->edad}}</td>
              <td>{{$mascotas->descripcion}}</td>
              <td>{{$mascotas->raza}}</td>
              <td>
                <button class="btn btn-info btn-sm" onclick="Editar({{$mascotas->id}})" data-toggle="tooltip" data-placement="top" title="Editar"><i class="mdi mdi-pencil"></i></button> 
                <button class="btn btn-danger btn-sm" onclick="Eliminar({{$mascotas->id}})" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="mdi mdi-cancel"></i></button>
                <a href="{{ route('historial', $mascotas->id)}}" class="btn btn-warning btn-sm"><i class="mdi mdi-eye" data-toggle="tooltip" data-placement="top" title="Historial Clínico"></i></a>
              </td>
            </tr>
            @endforeach 
          </tbody>
        </table>
        </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="MascotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #808080">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Ingrese su mascota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <form action="{{route('mascota.store')}}" method="POST" id="FormMascota" files="true">
            @csrf
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
                      <input type="text" class="form-control" name="edad" id="edad" onkeypress="return numeros_edad(event)" maxlength="2" placeholder="">
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
                      <input type="text" class="form-control" name="peso" id="peso" maxlength="2" onkeypress="return numeros(event)"  placeholder="1.5">
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
          </form>
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
      });
        /*'processing' : true,
    		'serverSide' : true,
    		'ajax' : '/mascota/table',
    		'columns' : [
    			{data: 'imagen', name: 'imagen'},
    			{data: 'nombre', name: 'nombre'},
    			{data: 'edad', name: 'edad'},
                {data: 'tipo.descripcion', name: 'tipo.descripcion'},
                {data: 'raza', name: 'raza'},
    	        {data: 'acciones', name: 'acciones',orderable: false, searchable: false},

    		]*/

		
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
  var ruta = "https://www.innovaredgroup.cl/testVet/public/mascota/edit/"+id;
  //alert(ruta)
  $.get(ruta,  function(data){
    
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
      var url = "https://www.innovaredgroup.cl/testVet/public/mascota-edit/"+id;
      
    
            
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
                        location.reload();
                        $('#EditMascotaModal').hide();
                    
                    });
                 }
              }
        });
    
  });
  var Eliminar = function(id)
  {
      var url='https://www.innovaredgroup.cl/testVet/public/mascota/eliminar/'+id
      //alert(url)
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
              url: url,
              type: 'GET',
              dataType: 'JSON',
                  success: function(respuesta) {
                      //alert(JSON.stringify(respuesta))
                    if (respuesta.message == 'success') {
                        swal("OK!", "Mascota Eliminado Correctamente!", "success")
                        .then((value) => {
                          location.reload();
                        });
                    }
                  },
                  error: function (xhr, textStatus, errorThrown) {
                 
                    console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
                    alert("Error en la solicitud AJAX. Verifica la consola para obtener más detalles.");
                  
                }

            });
          } 
          else 
          {
              alert("no pasa na")
          }
        });
  }

  
    function numeros(e){
        var tecla = e.keyCode;
        var input = e.target;
        var contenido = input.value;

            if (tecla==8 || tecla==9 || tecla==13){
                return true;
            }               
            var patron =/[0-9]/;
            var tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
        function numeros_edad(e){
          var tecla = e.keyCode;
          var input = e.target;
          var contenido = input.value;

            if (tecla==8 || tecla==9 || tecla==13){
                return true;
            }
            if(contenido < '30')
            {
              return true
            }
            else if(contenido < 30){
              $(document).ready(function(){
                alert("edad incorrecta")
                $("#edad").val("");
                $("#edad").focus();
              })
            }
                
            var patron =/[0-9]/;
            var tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);

        }

  
        
         </script>
@endsection