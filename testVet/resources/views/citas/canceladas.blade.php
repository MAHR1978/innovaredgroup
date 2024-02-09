@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/mascota') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Volver</a></li>
  </ol>
</nav>
<div class="row">
    <div class="col-12 col-lg-12 mb-20">
        <div class="card border-primary mb-10">
            <div class="card-header">Historial Clínico</div>
            <div class="card-body">
                
            </div>
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