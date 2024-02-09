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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"  style="background-color: #808080; color: #fff;">Centro Médico</th>
                        @if(Auth::user()->role == 'paciente' || Auth::user()->role == 'admin')
                        <th scope="col"  style="background-color: #808080; color: #fff;">Veterinario</th>
                        @endif
                        <th scope="col"  style="background-color: #808080; color: #fff;">Fecha Atención</th>
                        <th scope="col"  style="background-color: #808080; color: #fff;">Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($atenciones as $atencion)
                      <tr>
                        <td>{{ $atencion->nombre_centro }}</td>
                        @if(Auth::user()->role == 'paciente' || Auth::user()->role == 'admin')
                        <td>{{ $atencion->nombre_veterinario.' '.$atencion->apellido_paterno.' '. $atencion->apellido_materno }}</td>
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
