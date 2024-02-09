@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @if(Auth::user()->role == 'paciente' || Auth::user()->role == 'admin')
    <li class="breadcrumb-item"><a href="{{ url('/mascota') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Volver</a></li>
    @else 
    <li class="breadcrumb-item"><a href="{{ url('/fichas') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Volver</a></li>
    @endif
  </ol>
</nav>
<div class="row">
    <div class="col-12 col-lg-12 mb-20">
        <div class="card border-primary mb-10">
            <div class="card-header">Historial Clínico</div>
            <div class="card-body text-primary">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Centro Médico</th>
                        @if(Auth::user()->role == 'paciente' || Auth::user()->role == 'admin')
                        <th scope="col">Veterinario</th>
                        @endif
                        <th scope="col">Fecha Atención</th>
                        <th scope="col">Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($atenciones as $atencion)
                      <tr>
                        <td>{{ $atencion->centros->centro }}</td>
                        @if(Auth::user()->role == 'paciente' || Auth::user()->role == 'admin')
                        <td>{{ $atencion->veterinarios->name.' '.$atencion->veterinarios->apellido_paterno.' '. $atencion->veterinarios->apellido_materno }}</td>
                        @endif
                        <td>{{ $atencion->fecha_atencion }}</td>
                        <td><a href="{{ url('/horas-atendidas/'.Crypt::encrypt($atencion->id).'') }}" class="btn btn-success btn-sm"><i class="mdi mdi-comment-search"></i>  Ir al Detalle</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
        }
    });
});
</script>
@endsection
