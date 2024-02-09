@extends('home')
@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i>  Home</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #041E42; color: #fff;">
      <button type="button" class="btn btn-info btn-sm" id="btnVeterinario"><i class="mdi mdi-plus-box"></i> Agregar</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Rut</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Dirección</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Teléfono</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Email</th>
              <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
            </tr>
          </thead>
        </table>
        </div>
    </div>
  </div>
    <!-- Modal -->
<div class="modal fade" id="VeterinarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #041E42">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Ingreso de veterinario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => 'veterinario.store', 'method' => 'POST','id' => 'FormVeterinaria', 'files' => true]) !!}
            <div class="form-row">
              <div class="col-md-6 mb-16">
            <div class="form-group">
                <label for="inputPassword3">Tipo</label>
                <select name="especialidad[]" id="especialidad" class="form-control">
                  <option value="0">--Seleccione Especialidad--</option>
                      @foreach($especialidad as $tipo)
                             <option value="{{ $tipo->id }}"> {{ $tipo->especialidad }} </option>
                      @endforeach
                 </select>
              </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Centro</label>
                <select name="centro" id="centroveterinario" class="form-control">
                    <option value="0">--Seleccione Centro--</option>
                      @foreach($centros as $centro)
                             <option value="{{ $centro->id }}"> {{ $centro->centro }} </option>
                      @endforeach
                 </select>
              </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre">
              </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Rut</label>
                  <input type="text" class="form-control" name="rut" id="rut" maxlength="12">
              </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellido_paterno" id="apellidopaterno">
                </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Apellido Materno</label>
                  <input type="text" class="form-control" name="apellido_materno" id="apellidomaterno">
              </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Teléfono</label>
                  <input type="text" class="form-control" name="fono" id="fono">
              </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Direccion</label>
                  <input type="text" class="form-control" name="direccion" id="direccion">
              </div>
              </div>
            </div>
              
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" id="IngresarVeterinario">Guardar</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
        $('.table').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        'processing' : true,
    		'serverSide' : true,
    		'ajax' : '/veterinario/table',
    		'columns' : [
    			{data: 'rut', name: 'rut'},
    			{data: 'nombre', name: 'nombre'},
          {data: 'direccion', name: 'direccion'},
          {data: 'fono', name: 'fono'},
          {data: 'email', name: 'email'},
          {data: 'acciones', name: 'acciones',orderable: false, searchable: false},

    		]

		});
    $('.table').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });

        $('#btnVeterinario').on('click', function(e) {
            e.preventDefault();
            $('#VeterinarioModal').modal({backdrop: 'static', keyboard: false, show: true});
        });

        $('#rut').Rut({
        on_error: function(){ 
            swal("¡Error!", "¡Rut Incorrecto!", "error");
            $('#rut').val(''); 
            },
        format_on: 'keyup'
        });



        $('#IngresarVeterinario').on('click', function(e) {
            e.preventDefault();
    
            var Especialidad = $("#tipomascota").val();
            var Rut = $("#rut").val();
            var Nombre = $("#nombre").val();
            var ApellidoPaterno = $("#apellidopaterno").val();
            var ApellidoMaterno = $("#apellidomaterno").val();
            var Direccion = $("#direccion").val();
            var Fono = $("#fono").val();
            var Email = $("#email").val();
            
    
            
            if($('#especialidad').val()==0)
            {
            toastr.error('Ingrese una especialidad', 'Error!', {timeOut: 3000})
            return false;
            }
            if($('#centro').val()==0)
            {
            toastr.error('Ingrese centro veterinario', 'Error!', {timeOut: 3000})
            return false;
            }
            if(Rut === '')
            {
                toastr.error('Ingrese rut', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Nombre === '')
            {
                toastr.error('Ingrese el nombre', 'Error!', {timeOut: 3000})
                return false;
            }
            if(ApellidoPaterno === '')
            {
                toastr.error('Ingrese su primer apellido', 'Error!', {timeOut: 3000})
                return false;
            }
            if(ApellidoMaterno === '')
            {
                toastr.error('Ingrese su segundo apellido', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Fono === '')
            {
                toastr.error('Ingrese teléfono', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Email === '')
            {
                toastr.error('Ingrese email', 'Error!', {timeOut: 3000})
                return false;
            }
    
    
    
         var form = $('#FormVeterinaria');
         var url = form.attr('action');
         //var formData = new FormData($("#FormMascota")[0]);
         
    
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          type: 'POST',
          data: form.serialize(),
          dataType: 'JSON',
          success: function(respuesta) {
                if (respuesta.message == 'success') {
                    swal("OK!", "Veterinario Ingresado Correctamente!", "success")
                    .then((value) => {
                        $("#FormVeterinaria")[0].reset();
                        $('.table').DataTable().ajax.reload();
                        location.reload();
                    });
                 }
              },
                error: function (respuesta) {
                  swal({
                    title: "Error!",
                    text: "El Email Ya Está Registrado",
                    icon: "error",
                    buttons: {willDelete: "Entendido!",},
                    dangerMode: true,
                    })
                  .then((willDelete) => {
                    if (willDelete) {
                      location.reload();
                    }
                    });
                }
          });
    
    
         });
    });

    var Editar = function(id)
    {
      var ruta = "veterinario/"+id+"/edit";
      $.getJSON(ruta, function(data){
        $('#EditVeterinarioModal').modal({backdrop: 'static', keyboard: false, show: true}); 
        
        $.each(data.veterinario, function(key, dato) {
        /*$('#tipomascotas  option[value="'+data.tipo_id+'"]').prop("selected", true);*/
        $('#nombres').val(dato.name);
        $('#apellidomaternos').val(dato.apellido_paterno);
        $('#apellidopaternos').val(dato.apellido_materno);
        $('#ruts').val(dato.rut);
        $('#direccions').val(dato.direccion);
        $('#fonos').val(dato.fono);
        $('#emails').val(dato.email);
        $('#id').val(dato.id);
      });
    });
    }
</script>
@endsection
