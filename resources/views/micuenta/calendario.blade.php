@extends('layouts.app')
@section('content')
<div id='calendar'></div>
@include('micuenta.detalleCalendario')
@endsection
@section('scripts')
<script type="text/javascript" src='js/main.js'></script>
<script type="text/javascript" src='https://unpkg.com/fullcalendar@5.1.0/locales-all.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap',
        locale: 'es',
        timeZone: 'America/Santiago',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      eventClick: function(arg) {
        $('#DetalleEventoModal').modal({backdrop: 'static', keyboard: false, show: true});
        $('#Paciente').html(arg.event.extendedProps.paciente);
        $('#Veterinario').html(arg.event.extendedProps.veterinario);
        $('#Fecha').html(arg.event.extendedProps.fecha);
        $('#Hora').html(arg.event.extendedProps.hora);
        $('#Status').html(arg.event.extendedProps.estado);
      },
     /* events: [
        {
          title: 'Evento 1',
          start: '2024-01-05T10:00:00',
          end: '2024-01-05T14:00:00'
        },
        {
          title: 'Evento 2',
          start: '2024-01-10T12:30:00',
          end: '2024-01-10T15:30:00'
        }
        // Agrega más eventos según sea necesario
      ],
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events*/
      events: '{{url('listar/'.Auth::user()->id)}}',
    });

    calendar.render();
  });
</script>
@endsection 