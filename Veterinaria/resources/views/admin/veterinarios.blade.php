@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
  </ol>
</nav>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Rut</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Nombre</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Apellidos</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Dirección</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Teléfono</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Email</th>
        <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($veterinarios as $veterinario)
      <tr>
        <td>{{ $veterinario->rut }}</td>
        <td>{{ $veterinario->name }}</td>
        <td>{{ $veterinario->apellido_paterno.' '.$veterinario->apellido_materno}}</td>
        <td>{{ $veterinario->direccion }}</td>
        <td>{{ $veterinario->fono }}</td>
        <td>{{ $veterinario->email }}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
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