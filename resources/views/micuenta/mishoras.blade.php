@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #808080; color: #fff;">
      <p id="btnMascota"><i class="fa fa-plus-square"></i> Mis Horas</p>
    </div>
    <div class="card-body">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active"  data-toggle="pill" href="#citas-reservadas" role="tab" aria-selected="true">@if(Auth::user()->role == 'admin') Próximas Citas @else Mis Próximas Citas @endif </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-toggle="pill" href="#citas-canceladas" role="tab" aria-selected="false">@if(Auth::user()->role == 'admin') Horas Canceladas @else Mis Horas Canceladas @endif </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-toggle="pill" href="#citas-atendidas" role="tab" aria-selected="false">@if(Auth::user()->role == 'admin') Horas Atendidas @else Mis Horas Atendidas @endif </a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="citas-reservadas" role="tabpanel">
          <br>
          <div class="table-responsive">
            <table class="table proxima" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #808080; color: #fff;">Centro</th>
              @if(Auth::user()->role == 'paciente')
              <th scope="col" style="background-color: #808080; color: #fff;">Veterinario</th>
              @elseif(Auth::user()->role == 'medico' || Auth::user()->role == 'admin')
              <th scope="col" style="background-color: #808080; color: #fff;">Paciente</th>
              @endif
              <th scope="col" style="background-color: #808080; color: #fff;">Fecha</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Hora</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Estado</th>
              <th scope="col" class="text-center" style="background-color: #808080; color: #fff;">Acciones</th>
            </tr>            
          </thead>
          <tbody>
            @foreach($mishoras as $mihora)
              <tr>                
                <td>{{$mihora->centro}}</td>
                @if(Auth::user()->role == 'paciente')
                  <td>{{$mihora->name.' '.$mihora->apellido_paterno.' '.$mihora->apellido_materno}}</td>
                @elseif(Auth::user()->role == 'medico' || Auth::user()->role == 'admin')
                  <td>{{$mihora->name.' '.$mihora->apellido_paterno.' '.$mihora->apellido_materno}}</td>
                @endif           
                <td>{{$mihora->hora_fecha}}</td>
                <td>{{$mihora->hora_hora}}</td>
                <td><span class="badge mb-5 badge-info">{{$mihora->status}}</span></td>
                <td>
                  @if(Auth::user()->role == 'paciente')
                    <button class="btn btn-sm btn-danger" onclick="Cancelar({{$mihora->id}})"><i class="mdi mdi-cancel"></i> Cancelar</button>
                  @elseif(Auth::user()->role == 'medico' || Auth::user()->role == 'admin')
                    <a href="{{ route('atencion.show', Crypt::encrypt($mihora->id))}}" class="btn btn-sm btn-success"><i class="mdi mdi-doctor"></i> Atender</a>
                    @else
                      <button class="btn btn-sm btn-danger" onclick="CancelarAdmin('.$mishoras->id.')"><i class="mdi mdi-cancel"></i> Cancelar</button>
                      <a href="'. route('detalles.reservadas', Crypt::encrypt($mishoras->id)) .'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Detalle"><i class="mdi mdi-feature-search"></i> Detalle</a>
                   @endif

                </td>
              </tr>
            @endforeach   
          </tbody>
 
        </table>
        </div>
        </div>
        <div class="tab-pane fade" id="citas-canceladas" role="tabpanel">
          <br>
          @include('micuenta.canceladas')
        </div>
        <div class="tab-pane fade" id="citas-atendidas" role="tabpanel">
          <br>
          @include('micuenta.atendidas');
        </div>
      </div>
    </div>
  </div>
@include('admin.cancelar')
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
      $('.proxima').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
      });
       //'processing' : true,
    		//'serverSide' : true,
    		//'ajax' : 'mis-horas/table',
    		/*'columns' : [
    			{data: 'centros.centro', name: 'centros.centro'},
    			{data: 'persona', name: 'persona'},
    			{data: 'hora_fecha', name: 'hora_fecha'},
          		{data: 'hora_hora', name: 'hora_hora'},
          		{data: 'status', name: 'status'},
    	    	{data: 'acciones', name: 'acciones',orderable: false, searchable: false},

    		]
*/
		
    $('.proxima').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
    $('.atendidas').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }

		});
    $('.cancelada').DataTable({
			"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }

		});
    });

var Cancelar = function(id)
{
  swal({
  title: "Esta Seguro?",
  text: "Una vez cancelada, no podrá volerla a agendar!",
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
  		  url:"https://www.innovaredgroup.cl/demoVet/public/cancelar-horas/"+id,
        type: 'GET',
        dataType: 'JSON',
        success: function(respuesta) {
          if (respuesta.message == 'success') {

              swal("OK!", "Hora Cancelada Correctamente!", "success")
              .then((value) => {
                //$('.proxima').DataTable().ajax.reload();
                location.reload();
              });
           }
       },
          error: function (respuesta) {
            swal("Error!", "Error de conexion, intentelo más tarde.", "error");
          }

  	});
    } 
});
}

var CancelarAdmin = function(id)
{
  $('#CancelarModalCenter').modal({backdrop: 'static', keyboard: false, show: true}); 
  $('#id').val(id);
}

        $('#CancelarHora').on('click', function(e) {
            e.preventDefault();
    
            var Motivo = $("#Motivo").val();
            
            
            if(Motivo === '')
            {
                toastr.error('Ingrese el motivo', 'Error!', {timeOut: 3000})
                return false;
            }
    
    
            
         var form = $('#FormCancelarHora');
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
                if (respuesta.message == 'success') {
                    swal("OK!", "Hora Cancelada Correctamente!", "success")
                    .then((value) => {
                        $("#FormCancelarHora")[0].reset();
                        $('.proxima').DataTable().ajax.reload();
                        location.reload();
                    });
                 }
              }
          });
    
    
         });
</script>
@endsection