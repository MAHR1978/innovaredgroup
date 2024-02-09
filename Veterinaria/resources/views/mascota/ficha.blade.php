@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i>  Home</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #808080; color: #fff;">Buscar Ficha</div>
    <div class="card-body text-primary">
        {!! Form::open(['route' => 'fichas', 'method' => 'POST','id' => 'FormBuscarFichas']) !!}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress2">Seleccione Tipo de Busqueda</label>
                <select class="form-control" name="tipo" id="Tipo">
                    <option value="0">--Elija Opción--</option>
                    <option value="rut">Rut Dueño</option>
                    <option value="email">Email Dueño</option>
                    <option value="mascota">Nombre Mascota</option>
                </select>
            </div>
        </div>
        <div class="form-row" id="RutPersona">
            <div class="form-group col-md-6">
                <label for="inputAddress2">Ingrese Rut Dueño</label>
                <input type="text" class="form-control" name="rut" id="rut" maxlength="12" value="{{ old('rut') }}">
            </div>
        </div>
        <div class="form-row" id="NombrePersona">
            <div class="form-group col-md-6">
                <label for="inputAddress2">Ingrese Email Dueño</label>
                <input type="text" class="form-control" name="email" id="email"  value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-row" id="NombreMascota">
            <div class="form-group col-md-6">
                <label for="inputAddress2">Ingrese Nombre Mascota</label>
                <input type="text" class="form-control" name="mascota" id="mascota"  value="{{ old('mascota') }}">
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="BuscarFichas">Buscar</button>
        {!! Form::close() !!}
        <br>
        <div id="Tabla">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                  <th scope="col" style="background-color: #808080; color: #fff;">Imagen</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Nombre</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Ver Ficha</th>
                </thead>
                <tbody id="cuerpo">
                </tbody>
              </table>
        </div>
        <div id="Error">
            <h2>No hay Datos</h2>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
        $('#Tabla').hide();
        $('#Error').hide();
        $('#BuscarFichas').hide();

        $('#RutPersona').hide();
        $('#NombrePersona').hide();
        $('#NombreMascota').hide();
        $('#rut').Rut({
        on_error: function(){ 
            swal("¡Error!", "¡Rut Incorrecto!", "error");
            $('#rut').val(''); 
            },
        format_on: 'keyup'
        });

        $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });


    $("#Tipo").change(function(){
            var Valor = $(this).val();
            if(Valor == "rut"){
                $('#RutPersona').show();
                $('#NombrePersona').hide();
                $('#NombreMascota').hide();
                $('#email').prop('disabled', true);
                $('#mascota').prop('disabled', true);
                $('#rut').prop('disabled', false);
                $('#BuscarFichas').show();
            }else if(Valor == "email"){
                $('#RutPersona').hide();
                $('#NombrePersona').show();
                $('#NombreMascota').hide();
                $('#rut').prop('disabled', true);
                $('#mascota').prop('disabled', true);
                $('#email').prop('disabled', false);
                $('#BuscarFichas').show();
            }else if(Valor == "mascota"){
                $('#RutPersona').hide();
                $('#NombrePersona').hide();
                $('#NombreMascota').show();
                $('#rut').prop('disabled', true);
                $('#email').prop('disabled', true);  
                $('#mascota').prop('disabled', false);
                $('#BuscarFichas').show();
            }else{
                location.reload();
            }
	});
        $('#BuscarFichas').on('click', function(e) {
            e.preventDefault();

            var Rut = $("#rut").val();

            /*if(Rut === '')
            {
                toastr.error('Ingrese Rut a Buscar', 'Error!', {timeOut: 3000})
                return false;
            }*/


            var form = $('#FormBuscarFichas');
            var url = form.attr('action');

            $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: url,
          type: 'POST',
          data: form.serialize(),
          dataType: 'JSON',
          success: function(respuesta) {
                if (Array.isArray(respuesta.data) && respuesta.data.length) {
                    $('#Tabla').show();
                    $('#Error').hide();
                    $("#cuerpo").html("");
                    for(var i=0; i<respuesta.data.length; i++){
                        //var id = `{{ Crypt::encrypt(`+respuesta.data[i].id+`) }}`;
                        var url = '{{ route("historial", ":id") }}';
                        url = url.replace(':id', respuesta.data[i].id);
                        var tr = `<tr>
                        <td><img src=https://innovaredgroup.cl/Veterinaria/public/`+respuesta.data[i].imagen+` width=90 height=60></td>
                        <td>`+respuesta.data[i].nombre+`</td>
                        <td><a href=`+url+` class="btn btn-sm btn-info"><i class="mdi mdi-eye"></i> Ver</a></td>
                        </tr>`;
                        $("#cuerpo").append(tr);
                    }
                    
                 }else{
                    $('#Tabla').hide();
                    $('#Error').show();

                 }
              }
          });


        });
    });
</script>
@endsection