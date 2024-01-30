@extends('home')
@section('contenido')
<div class="jumbotron">
  <h1 clss="display-4" style="color: #00BFB2;">Accesos directos de la aplicación</h1>
    <hr class="my-4">
        <div class="card-deck">
          @if(Auth::user()->role =='paciente')
<div class="card mb-3" style="max-width: 18rem;border-color: #E0004D;">
    <div class="card-header mb-3" align="center" style="border-color: #E0004D;"><i class="mdi mdi-paw" style="font-size:36px"></i></div>
    <div class="card-body text-success">
      <h5 class="card-title" align="center">Mis Mascotas</h5>
      <!--<p class="card-text" align="center"><span class="badge badge-success">Total : </span></p>-->
      <a href="{{ url('/mascota') }}" class="btn btn-primary btn-lg btn-block">Ver</a>
    </div>
  </div>
  <div class="card mb-3" style="max-width: 18rem; border-color: #E0004D;">
    <div class="card-header mb-3" align="center" style="border-color: #E0004D;"><i class="mdi mdi-stethoscope" style="font-size:36px;"></i></div>
    <div class="card-body text-info">
      <h5 class="card-title" align="center">Pedir una Hora</h5>
      <!--<p class="card-text" align="center"><span class="badge badge-info">Total : </span></p>-->
      <a href="{{ url('/agendar-hora') }}" class="btn btn-primary btn-lg btn-block">Pedir</a>
    </div>
  </div>
@elseif(Auth::user()->role =='medico')
<div class="card mb-3" style="max-width: 18rem;border-color: #E0004D;">
  <div class="card-header mb-3" align="center" style="border-color: #E0004D;"><i class="mdi mdi-calendar-clock" style="font-size:36px"></i></div>
  <div class="card-body text-success">
    <h5 class="card-title" align="center">Mis Citas</h5>
    <!--<p class="card-text" align="center"><span class="badge badge-success">Total : </span></p>-->
    <a href="{{ url('/horas') }}" class="btn btn-primary btn-lg btn-block">Ver</a>
  </div>
</div>
<div class="card mb-3" style="max-width: 18rem; border-color: #E0004D;">
  <div class="card-header mb-3" align="center" style="border-color: #E0004D;"><i class="mdi mdi-calendar-search" style="font-size:36px;"></i></div>
  <div class="card-body text-info">
    <h5 class="card-title" align="center">Mi Horario</h5>
    <!--<p class="card-text" align="center"><span class="badge badge-info">Total : </span></p>-->
    <a href="{{ url('/horario/'.Crypt::encrypt(Auth::user()->id).'') }}" class="btn btn-primary btn-lg btn-block">Ver</a>
  </div>
</div>
@else
<div class="card mb-3" style="max-width: 18rem;border-color: #E0004D;">
  <div class="card-header mb-3" align="center" style="border-color: #E0004D;"><i class="mdi mdi-calendar-clock" style="font-size:36px"></i></div>
  <div class="card-body text-success">
    <h5 class="card-title" align="center">Todas las Citas</h5>
    <!--<p class="card-text" align="center"><span class="badge badge-success">Total : </span></p>-->
    <a href="{{ url('/horas') }}" class="btn btn-primary btn-lg btn-block">Ver</a>
  </div>
</div>
<div class="card mb-3" style="max-width: 18rem; border-color: #E0004D;">
  <div class="card-header mb-3" align="center" style="border-color: #E0004D;"><i class="mdi mdi-doctor" style="font-size:36px;"></i></div>
  <div class="card-body text-info">
    <h5 class="card-title" align="center">Veterinarios</h5>
    <!--<p class="card-text" align="center"><span class="badge badge-info">Total : </span></p>-->
    <a href="{{ url('/veterinario/table') }}" class="btn btn-primary btn-lg btn-block">Ver</a>
  </div>
</div>
@endif

</div>
</div>
@endsection