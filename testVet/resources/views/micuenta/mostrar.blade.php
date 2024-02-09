@extends('home')
@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mis Datos</li>
  </ol>
</nav>
<div class="card" style="border-color: #808080;">
    <div class="card-header" style="background-color: #808080; color: #fff;">
      Usuario : {{ Auth::user()->name.' '.Auth::user()->apellido_paterno.' '.Auth::user()->apellido_materno }}
    </div>
    <div class="card-body">
        <form action="{{route('actualizar')}}" method="POST" id="FormEditDatos" files="true">
        <input type="hidden" name="id" id="id" value="{{ $usuarios->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputEmail3">Rut</label>
                      <input type="text" class="form-control" name="rut" id="rut" maxlength="12" value="{{ $usuarios->rut }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3">Primer Apellido</label>
                      <input type="text" class="form-control" name="apellido_paterno" id="apellidopaterno" value="{{ $usuarios->apellido_paterno }}">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                      <input type="text" class="form-control" name="email" id="email" value="{{ $usuarios->email }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3">Fono</label>
                      <input type="text" class="form-control" name="fono" id="fono" value="{{ $usuarios->fono }}" maxlength="9">
                  </div>
                  
                  
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPassword3">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $usuarios->name }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3">Segundo Apellido</label>
                      <input type="text" class="form-control" name="apellido_materno" id="apellidomaterno" value="{{ $usuarios->apellido_materno }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3">Dirección</label>
                      <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $usuarios->direccion }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3">Password</label>
                      <input type="password" class="form-control" name="password" id="password">
                  </div>
                  
            </div>
        </div>
        <button type="button" class="btn btn-success float-right" id="EditarDatos">Editar mis datos</button>
      </form>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
    
    
        $('#EditarDatos').on('click', function(e) {
            e.preventDefault();
    
    
            var Nombre = $("#nombre").val();
            var ApellidoPaterno = $("#apellidopaterno").val();
            var ApellidoMaterno = $("#apellidomaterno").val();
            var Email = $("#email").val();
            var Direccion = $("#direccion").val();
            var Fono = $("#fono").val();
            var Password = $("#password").val();
            var id = $('#id').val();
            
    
    
    
    
            if(Nombre === '')
            {
                toastr.error('Ingrese su Nombre', 'Error!', {timeOut: 3000})
                return false;
            }
            if(ApellidoPaterno === '')
            {
                toastr.error('Ingrese Primer Apellido', 'Error!', {timeOut: 3000})
                return false;
            }
            if(ApellidoMaterno === '')
            {
                toastr.error('Ingrese Segundo Apellido ', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Email === '')
            {
                toastr.error('Ingrese su Email ', 'Error!', {timeOut: 3000})
                return false;
            }
            if($('#email').val().indexOf('@', 0) == -1 || $('#email').val().indexOf('.', 0) == -1)
            {

            toastr.error('Ingrese Email Valido.', 'Error!', {timeOut: 3000})
            return false;
            
            }
            if(Fono === '')
            {
                toastr.error('Ingrese su Teléfono ', 'Error!', {timeOut: 3000})
                return false;
            }
            if($("#fono").val().length != 9) {
              toastr.error('Su teléfono debe tener 9 caracteres', 'Error!', {timeOut: 3000})
                return false;
            }
    
    
    
         var form = $('#FormEditDatos');
         var url = form.attr('action');
         var formData = new FormData($("#FormEditDatos")[0]);
         
    
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
                    swal("OK!", "Datos Editados Correctamente!", "success")
                    .then((value) => {
                        $("#FormEditDatos")[0].reset();
                      location.reload();
                    });
                 }
              }
          });
    
    
         });
        });
         </script>
@endsection