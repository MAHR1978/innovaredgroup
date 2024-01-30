@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Volver</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #E0004D;">
    <div class="card-header" style="background-color: #808080; color: #fff;">
       <i class="fa fa-user-md"></i> Agendar
    </div>
    <div class="card-body">
      @if(count($errors)>0)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
         @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if(session('notification'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('notification') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <p>
        <strong>Información Obligatoria </strong><small style="color:red;">*</small>
      </p>
     <form action="{{route('reservar')}}" method="POST" id="FormHora" files="true">
      @csrf
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="inputPassword3">Mi Mascota <small style="color:red;"> *</small></label>
                <select name="mascota_id" id="tipomascota" class="form-control" required>
                    <option value="0">--Seleccione Mascota--</option>
                      @foreach($mi_mascotas as $mascota)
                             <option value="{{ $mascota->id }}" @if(old('mascota_id') == $mascota->id) selected @endif> 
                              {{ $mascota->nombre }} 
                            </option>
                      @endforeach
                 </select>
              </div>
              <div class="form-group">
                <label for="inputPassword3">Veterinario <small style="color:red;"> *</small></label>
                  <select class="form-control" name="veterinario_id" id="Veterinarios" required>
                    <option value="0">--Seleccione Veterinario--</option>
                      @foreach($veterinarios as $veterinario)
                        <option value="{{ $veterinario->id }}" @if(old('veterinario_id') == $veterinario->id) selected @endif> 
                          {{ $veterinario->name.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno }} 
                        </option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPassword3">Centro <small style="color:red;"> *</small></label>
                    <select name="centro_id" id="centroveterinario" class="form-control" required>
                        <option value="0">--Seleccione Centro--</option>
                          @foreach($centros as $centro)
                                 <option value="{{ $centro->id }}" @if(old('centro_id') == $centro->id) selected @endif>
                                   {{ $centro->centro }}
                                   </option>
                          @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3">Fecha <small style="color:red;"> *</small></label>
                    <input type="text" class="form-control" name="hora_fecha" id="Fecha" 
                    value="{{ old('hora_fecha', date('Y-m-d')) }}"
                    data-date-start-date="{{ date('Y-m-d') }}"
                    data-date-end-date="+30d">
                  </div>
                </div>
                <div class="col-md-12" id="hours">
                  <div class="col-sm-4">
                    @if(!empty($intervalos))                  
                      @foreach($intervalos['dia'] as $key => $interval)                    
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="hora_hora" id="intervalDia{{ $key }}" 
                              value="{{ $interval['inicio'] }}" required @if(old('hora_hora')) checked @endif>
                              <label class="form-check-label" for="intervalDia{{ $key }}">
                                {{ $interval['inicio'] }} - {{ $interval['termino'] }}
                              </label>
                            </div>
                          </div>
                      
                        @endforeach
                        </div>                  
                    <div class="col-sm-4">
                    @foreach($intervalos['tarde'] as $key => $interval)
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="hora_hora" id="intervalTarde{{ $key }}" 
                          value="{{ $interval['inicio'] }}" required @if(old('hora_hora')) checked @endif>
                          <label class="form-check-label" for="intervalTarde{{ $key }}">
                            {{ $interval['inicio'] }} - {{ $interval['termino'] }}
                          </label>
                      </div>
                      @endforeach
                    </div>
                      
                      </div>
                      @else
                      @endif
                  </div>
              </div>
                <br>
                <!--<div class="col-md-6">
                <div class="form-group">
                    <label for="inputPassword3">Realizar pago <small style="color:red;"> *</small></label>
                    <input type="button" id="irPago" class="form-control btn-primary" value="ir a pagar"></input>                   
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="condiciones">
                      <label class="form-check-label" for="condiciones">
                        Términos y Condiciones <small style="color:red;"> *</small>
                      </label>
                    </div>
                  </div>
                </div>-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputPassword3">Adjuntar pago <small style="color:red;"> *</small></label>
                    <input type="file" name="pago" id="Pago" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="condiciones">
                      <label class="form-check-label" for="condiciones">
                        Términos y Condiciones <small style="color:red;"> *</small>
                      </label>
                    </div>
                  </div>
                </div>
                <br>
                </div>
                <button type="button" class="btn btn-primary btn-block" id="IngresarHora">Guardar</button> 
        </div>
      </form>
    </div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
$(document).ready(function($) {
 $("#irPago").click(function(){
      Swal.fire({
      icon: 'info',
      title: '',
      html:
        '<p><strong>Estimado Usuario antes de generar su hora médica, deberá tener disponible el archivo de trasferencia para poder adjuntar!</strong></p>'+
        '<ul>'+
        '<li>Costo y forma de pago: $ 5.500.-  Vía transferencia bancaria</li>' +
        '<li>Envió de comprobante  transferencia a contacto@innovaredgroup.cl</li>' +
        '<li>Banco estado</li>' +
        '<li>Cuenta Rut</li>' +
        '<li>InnovaredGroup Servicios Dentales</li>'+
        '<li>Rut. 77.822.158-6</li>'+
        '<li>Número de Cuenta 13339452</li>'+
        '<li>Estare muy feliz!!!!</li>'+
        '</ul>',
      width: '800px',
      allowOutsideClick: false
      
    });
    window.location.href="https://www.innovaredgroup.cl/demoVet/public/pago"
 })



$('input:checkbox').on('click', function() {
  chkId = $(this).val();
  if(chkId == 1){
    var docLocation = 'https://www.innovaredgroup.cl/Veterinaria/public/download/CONSENTIMIENTO_INFORMADO_AUTORIZACION.pdf';
    window.open(docLocation,"resizeable,scrollbar"); 
    //window.open("/download/Telemedicina_Concentimiento.pdf", "width=500,height=500,top=100,left=500");
  }

  });

$('#IngresarHora').on('click', function(e) {
    e.preventDefault();

    var Pago = $('#Pago').val();
    var condiciones = $("#condiciones").is(":checked");
        if (!condiciones) {
          toastr.error('Acepte Términos y Condiciones', 'Error!', {timeOut: 3000})
          return false;
        }

    if($('#tipomascota').val()==0)
    {
      toastr.error('Ingrese una mascota', 'Error!', {timeOut: 3000})
      return false;
    }
    if($('#Veterinarios').val()==0)
    {
      toastr.error('Ingrese un Programa', 'Error!', {timeOut: 3000})
      return false;
    }
    if($('#centroveterinario').val()==0)
    {
      toastr.error('Ingrese un centro veterinario', 'Error!', {timeOut: 3000})
      return false;
    }
    /*if(!$("#FormHora input[name='hora_hora']:radio").is(':checked')) 
    { 
      toastr.error('Seleccione al menos una hora ', 'Error!', {timeOut: 3000})
      return false;
    }*/

    if(Pago === '') 
    { 
      toastr.error('Debe adjuntar el pago para poder reservar su hora ', 'Error!', {timeOut: 3000})
      return false;
    }

    var form = $('#FormHora');
     var url = form.attr('action');
     var formData = new FormData($("#FormHora")[0]);
    
     //var FormHora = $("#FormHora").serialize();
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
          beforeSend: function() {
                   $("#IngresarHora").attr("disabled", true).html('Registrando Hora... <i class="mdi mdi-sync mdi-spin"></i>');
          },
            success: function(respuesta) {
              //alert(respuesta)
                if (respuesta.message == 'success') {
                    swal.fire("OK!", "Su Hora ha Sido Reservada Correctamente!", "success")
                    .then((value) => {
                      window.location.href ='https://www.innovaredgroup.cl/demoVet/public/horas';
                    });
                 }
              },
              error:function(e){
                alert("error")
              }
          });
      });


});

    let $Veterinarios, $date, $valor, $hours;
    let iRadio;
    let NoHorasalerta = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Lo sentimos, no se encontraron horas disponibles para este día</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="icon mdi mdi-close" aria-hidden="true"></i></span>
    </button>
    </div>`;
    //$('#IngresarHora').hide();
    $('#Tabla').hide();
    $(function() {
        $valor = $('#centroveterinario');
        //alert($valor);
        $Veterinarios = $('#Veterinarios');
        $date = $('#Fecha');
        $hours = $('#hours');
        $valor.change(() =>{
            const CentroId = $valor.val();
            const url = `https://www.innovaredgroup.cl/demoVet/public/centros/veterinario/`+CentroId;
       //alert(url);
            $.getJSON(url, onVeterinarioLoad);
            
        });
        $Veterinarios.change(loadHours);
        $date.change(loadHours);
    });

    function onVeterinarioLoad(doctors){
        let htmlOptions = '';
        doctors.forEach(function(doctor) {
            htmlOptions += `<option value="${doctor.id}">${doctor.name} ${doctor.apellido_paterno} ${doctor.apellido_materno}</option>`;
        });
        $Veterinarios.html(htmlOptions);
        $('#IngresarHora').show();
        loadHours()
    }

    function loadHours()
    {
        const selectedDate = $date.val();
        const vetId = $Veterinarios.val();
        const url = `https://www.innovaredgroup.cl/demoVet/public/verhoras?dia=${selectedDate}&veterinario_id=${vetId}`;
       //alert(url)
       //const url='https://www.innovaredgroup.cl/testVet/public/calendario';
       //window.location.href='https://www.innovaredgroup.cl/testVet/public/calendario';
       $.getJSON(url, displayHours);
    }

    function displayHours(data)
    {
 
     //alert("pase por aki")
      if(!data.dia && !data.tarde || !Array.isArray(data.dia) || !data.dia.length && !Array.isArray(data.tarde) || !data.tarde.length){
          $.isEmptyObject(data.dia);
          $hours.html(NoHorasalerta);
          return;
        }
        let htmlHoras ='';
        iRadio =0;
        if(data.dia){
          
            const intervalos_dia = data.dia;
            intervalos_dia.forEach(interval =>{
                htmlHoras += getRadioIntervalsHtml(interval);
            });
        }
        if(data.tarde){
         
            const intervalos_tarde = data.tarde;
            intervalos_tarde.forEach(interval =>{
                htmlHoras += getRadioIntervalsHtml(interval);
            });
        }
        $hours.html(htmlHoras);
    }

    function getRadioIntervalsHtml(interval)
    {
        $('#Tabla').show();
        const text =`${interval.inicio} - ${interval.termino}`;
        return `
        <div class="custom-control custom-radio mb-10">
            <input type="radio" id="interval${iRadio}" name="hora_hora" class="custom-control-input" value="${interval.inicio}" required>
            <label class="custom-control-label" for="interval${iRadio++}"><strong>${text}</strong></label>
        </div>
      <br>
      `;
    }

    var dateToday = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#Fecha').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd', 
            locale: 'es-es',
            minDate: dateToday 
        });
</script>
@endsection