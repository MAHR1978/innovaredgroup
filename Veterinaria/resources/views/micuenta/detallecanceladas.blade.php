@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/horas') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Volver</a></li>
  </ol>
</nav>

        <div class="card" style="border-color: #E0004D;">
            <div class="card-header" style="background-color: #808080; color: #fff;">Detalle Hora Cancelada</div>
            <div class="card-body">
                <ul>
                    @foreach($usuario as $user)
                    <li><h3><strong>Usuario por atender: </strong>{{ $user->name.' '.$user->apellido_paterno.' '.$user->apellido_materno }}</h3></li>
                    <li><h3><strong>Teléfono Usuario: </strong>{{ $user->fono }}</h3></li>
                    @endforeach
                    @foreach($mascotas as $mascota)
                    <li><h3><strong>Mascota: </strong>{{ $mascota->nombre }}</h3></li>
                    @endforeach
                    @foreach($canceladas as $cancelada)
                    <li><h3><strong>Centro Médico : </strong>{{ $cancelada->centrosmedicos->centro }}</h3></li>
                    <li><h3><strong>Veterinario : </strong>{{ $cancelada->veterinarios->name.' '.$cancelada->veterinarios->apellido_paterno.' '.$cancelada->veterinarios->apellido_materno }}</h3></li>
                    <li><h3><strong>Fecha : </strong>{{ $cancelada->formatFecha() }}</h3></li>
                    <li><h3><strong>Hora : </strong>{{ $cancelada->formatHora() }}</h3></li>
                    <li><h3><strong>Motivo Cancelación : </strong>{{ $cancelada->motivo }}</h3></li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {
    });
</script>
@endsection