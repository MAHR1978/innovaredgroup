@extends('home')

@section('contenido')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @if(Auth::user()->role == 'medico')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i> Home</a></li>
    @elseif(Auth::user()->role == 'admin')
    <li class="breadcrumb-item"><a href="{{ url('/veterinario') }}" class="btn btn-sm btn-outline-info"><strong><i class="icon mdi mdi-arrow-left"></i> Volver</strong></a></li>
    @endif
    <li class="breadcrumb-item active" aria-current="page">Mi Horario</li>
  </ol>
</nav>
@if(session('notification'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('notification') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if(session('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
    @foreach(session('errors') as $error)
    <li><strong>{{ $error }}</strong></li>
    @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<form action="{{route('horario.store')}}" method="POST" id="FormMascota">
  @csrf
    <input type="hidden" name="veterinario_id" id="veterinario_id" value="{{ $id_decrypt }}">
      <div class="card" style="border-color: #E0004D;">
        <div class="card-header" style="background-color: #808080; color: #fff;">
          <i class="fa fa-user-md"></i> @if(Auth::user()->role == 'medico')Mi Horario  @else  Crear Horario para : {{ $veterinario->name.' '.$veterinario->apellido_paterno.' '.$veterinario->apellido_materno }} @endif
        </div>
    @if(Auth::user()->role == 'admin')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="ListadoAreas">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="background-color: #808080; color: #fff;">Día</th>
              <th scope="col" style="background-color: #808080; color: #fff;">Activo</th>
              <th scope="col" class="text-center" style="background-color: #808080; color: #fff;">Turno Mañana</th>
              <th scope="col" class="text-center" style="background-color: #808080; color: #fff;">Turno Tarde</th>
            </tr>
          </thead>
          <tbody>
              @foreach($horarios as $key => $horario)
              <tr>
              <th>{{ $dias[$key] }}</th>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="estado[]" value="{{ $key }}" id="defaultCheck1" @if($horario->estado) checked @endif>
                  <label class="form-check-label" for="defaultCheck1">
                  </label>
                </div>
              </td>
              <td>
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="dia_inicio[]">
                            @for($i=8; $i<=11; $i++)
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                            @if($i.':00 AM' == $horario->dia_inicio) selected @endif>
                            {{ $i }}:00 AM
                        </option>
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:30" 
                            @if($i.':30 AM' == $horario->dia_inicio) selected @endif>
                            {{ $i }}:30 AM
                        </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name="dia_termino[]">
                            @for($i=8; $i<=11; $i++)
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                            @if($i.':00 AM' == $horario->dia_termino) selected @endif>
                            {{ $i }}:00 AM
                        </option>
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:30" 
                            @if($i.':30 AM' == $horario->dia_termino) selected @endif>
                            {{ $i }}:30 AM
                        </option>
                            @endfor
                        </select>
                    </div>
                </div>
              </td>
              <td>
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="tarde_inicio[]">
                            @for($i=0; $i<=7; $i++)
                            <option value="{{ $i+12 }}:00"
                            @if($i.':00 PM' == $horario->tarde_inicio) selected @endif>
                            {{ $i+12 }}:00 PM
                        </option>
                            <option value="{{ $i+12 }}:30"
                            @if($i.':30 PM' == $horario->tarde_inicio) selected @endif>
                            {{ $i+12 }}:30 PM
                        </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name="tarde_termino[]">
                            @for($i=0; $i<=7; $i++)
                            <option value="{{ $i+12 }}:00"
                            @if($i.':00 PM' == $horario->tarde_termino) selected @endif>
                            {{ $i+12 }}:00 PM
                        </option>
                            <option value="{{ $i+12 }}:30"
                            @if($i.':30 PM' == $horario->tarde_termino) selected @endif>
                            {{ $i+12 }}:30 PM
                        </option>
                            @endfor
                        </select>
                    </div>
                </div>
              </td>
            </tr>
              @endforeach
          </tbody>
        </table>
        </div>
        <button type="submit" class="btn btn-primary float-right" id="EditarDatos">Ingresar Horario</button>
    </div>
        @elseif(Auth::user()->role == 'medico')
    <div class="card-body">
      <div class="table-responsive">
          <table class="table" id="ListadoAreas">
        <thead class="thead-light">
          <tr>
            <th scope="col">Día</th>
            <th scope="col">Activo</th>
            <th scope="col" class="text-center">Turno Mañana</th>
            <th scope="col" class="text-center">Turno Tarde</th>
          </tr>
        </thead>
        <tbody>
            @foreach($horarios as $key => $horario)
            <tr>
            <th>{{ $dias[$key] }}</th>
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="estado[]" value="{{ $key }}" id="defaultCheck1" @if($horario->estado) checked @endif disabled>
                <label class="form-check-label" for="defaultCheck1">
                </label>
              </div>
            </td>
            <td>
              <div class="row">
                  <div class="col">
                      <select class="form-control" name="dia_inicio[]" disabled="true">
                          @for($i=8; $i<=11; $i++)
                          <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                          @if($i.':00 AM' == $horario->dia_inicio) selected @endif>
                          {{ $i }}:00 AM
                      </option>
                          <option value="{{ ($i<10 ? '0' : '') . $i }}:30" 
                          @if($i.':30 AM' == $horario->dia_inicio) selected @endif>
                          {{ $i }}:30 AM
                      </option>
                          @endfor
                      </select>
                  </div>
                  <div class="col">
                      <select class="form-control" name="dia_termino[]" disabled="true">
                          @for($i=8; $i<=11; $i++)
                          <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                          @if($i.':00 AM' == $horario->dia_termino) selected @endif>
                          {{ $i }}:00 AM
                      </option>
                          <option value="{{ ($i<10 ? '0' : '') . $i }}:30" 
                          @if($i.':30 AM' == $horario->dia_termino) selected @endif>
                          {{ $i }}:30 AM
                      </option>
                          @endfor
                      </select>
                  </div>
              </div>
            </td>
            <td>
              <div class="row">
                  <div class="col">
                      <select class="form-control" name="tarde_inicio[]" disabled="true">
                          @for($i=0; $i<=7; $i++)
                          <option value="{{ $i+12 }}:00"
                          @if($i.':00 PM' == $horario->tarde_inicio) selected @endif>
                          {{ $i+12 }}:00 PM
                      </option>
                          <option value="{{ $i+12 }}:30"
                          @if($i.':30 PM' == $horario->tarde_inicio) selected @endif>
                          {{ $i+12 }}:30 PM
                      </option>
                          @endfor
                      </select>
                  </div>
                  <div class="col">
                      <select class="form-control" name="tarde_termino[]" disabled="true">
                          @for($i=0; $i<=7; $i++)
                          <option value="{{ $i+12 }}:00"
                          @if($i.':00 PM' == $horario->tarde_termino) selected @endif>
                          {{ $i+12 }}:00 PM
                      </option>
                          <option value="{{ $i+12 }}:30"
                          @if($i.':30 PM' == $horario->tarde_termino) selected @endif>
                          {{ $i+12 }}:30 PM
                      </option>
                          @endfor
                      </select>
                  </div>
              </div>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      </div>
  </div>
  @endif
  </div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function($) {

        
    });
</script>
@endsection