
@extends('home')
@section('contenido')
<style>
  
  </style>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/veterinario') }}">Volver</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Veterinario</li>
  </ol>
</nav>
<div class="card" style="border-color: #808080;">
  <div class="card-header" style="background-color: #808080; color: #fff;">Detalle Veterinario</div>
  <div class="card-body">
    <form   action="{{route('veterinario.edit',['id' => $veterinario->id])}}" method="POST" id="FormEditVeterinario" files="true" >
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $veterinario->id }}">
    <div class="form-row">
      <div class="col-md-6 mb-16">
    <div class="form-group">
        <label for="inputPassword3">Tipo</label>
        <select name="especialidad" id="especialidad" class="form-control">
          <option value="0">--Seleccione Especialidad--</option>
              @foreach($especialidades as $tipo)
              @if($especialidadmedico->id == $tipo->id)
                     <option value="{{ $tipo->id }}" selected> {{ $tipo->especialidad }} </option>
                     @else 
                     <option value="{{ $tipo->id }}"> {{ $tipo->especialidad }} </option>
                    @endif
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
                @if($centromedico->id == $centro->id)
                     <option value="{{ $centro->id }}" selected> {{ $centro->centro }} </option>
                    @else 
                    <option value="{{ $centro->id }}"> {{ $centro->centro }} </option>
                    @endif
              @endforeach
         </select>
      </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-16">
      <div class="form-group">
        <label for="inputPassword3">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $veterinario->name }}">
      </div>
      </div>
      <div class="col-md-6 mb-16">
      <div class="form-group">
        <label for="inputPassword3">Rut</label>
          <input type="text" class="form-control" name="rut" id="rut" maxlength="12" value="{{ $veterinario->rut }}">
      </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-16">
        <div class="form-group">
          <label for="inputPassword3">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellido_paterno" id="apellidopaterno" value="{{ $veterinario->apellido_paterno }}">
        </div>
      </div>
      <div class="col-md-6 mb-16">
      <div class="form-group">
        <label for="inputPassword3">Apellido Materno</label>
          <input type="text" class="form-control" name="apellido_materno" id="apellidomaterno" value="{{ $veterinario->apellido_materno }}">
      </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-16">
      <div class="form-group">
        <label for="inputPassword3">Teléfono</label>
          <input type="text" class="form-control" name="fono" id="fono" value="{{ $veterinario->fono }}">
      </div>
      </div>
      <div class="col-md-6 mb-16">
      <div class="form-group">
        <label for="inputPassword3">Direccion</label>
          <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $veterinario->direccion }}">
      </div>
      </div>
    </div>
      
    <div class="form-row">
      <div class="col-md-6 mb-16">
        <div class="form-group">
          <label for="inputPassword3">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $veterinario->email }}">
        </div>
      </div>
      <div class="col-md-6 mb-16">
        <div class="form-group">
          <label for="inputPassword3">Cambiar Clave</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-success float-right" id="EditarVeterinario">Editar Veterinario</button>
  </form>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

      $('#EditarVeterinario').on('click', function(e) {
            e.preventDefault();


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
    
    
    
         var form = $('#FormEditVeterinario');
         var url = form.attr('action');
         var formData = new FormData($("#FormEditVeterinario")[0]);
         //var formData=form.serialize();
       // alert(formData)
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          type: 'POST',
          data: formData,
          processData: false, // Necesario para enviar FormData
          contentType: false, // Necesario para enviar FormData
          success: function(respuesta) {
              alert("paso bien!!")
                if (respuesta.message == 'success') {
                    swal("OK!", "Veterinario Editado Correctamente!", "success")
                    .then((value) => {
                        $("#FormEditVeterinario")[0].reset();
                        window.location='../veterinario';
                    });
                 }
              },
            error: function(e){
              swal("Error!", "Ocurrio un error favor contactar con soporte !!", "error")
            }
          });

      });

    });
</script>
@endsection