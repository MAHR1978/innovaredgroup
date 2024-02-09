@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/horas') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Volver</a></li>
  </ol>
</nav>

        <div class="card" style="border-color: #E0004D;">
            <div class="card-header" style="background-color: #041E42; color: #fff;">Detalle Hora Reservada</div>
            <div class="card-body">
                <div class="form-row">
                    @foreach($usuario as $user)
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Usuario por atender</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $user->name.' '.$user->apellido_paterno.' '.$user->apellido_materno }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Teléfono Usuario</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $user->fono }}" readonly>
                    </div>
                    @endforeach
                </div>
            <div class="form-row">
                @foreach($mascotas as $mascota)
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mascota</label>
                    <input type="text" class="form-control" id="inputEmail4" value="{{ $mascota->nombre }}" readonly>
                </div>
                @endforeach
            </div>
            <div class="form-row">
                @foreach($reservadas as $reservada)
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Centro Médico</label>
                    <input type="text" class="form-control" id="inputEmail4" value="{{ $reservada->centrosmedicos->centro }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Veterinario</label>
                    <input type="text" class="form-control" id="inputEmail4" value="{{ $reservada->veterinarios->name.' '.$reservada->veterinarios->apellido_paterno.' '.$reservada->veterinarios->apellido_materno }}" readonly>
                </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Fecha</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $reservada->formatFecha() }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Hora</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $reservada->formatHora() }}" readonly>
                    </div>
                <br>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Pago Adjuntado</label><br>
                        <img src="{{ '/'.$reservada->imagen }}" class="img-fluid" width="300" height="300">
                    </div>
                @endforeach
            </div>
            </div>
        </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
    });
</script>
@endsection