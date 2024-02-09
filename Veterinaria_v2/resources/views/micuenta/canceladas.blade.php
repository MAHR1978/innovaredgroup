<div class="table-responsive">
    <table class="table cancelada" id="ListadoCan">
      <thead class="thead-light">
        <tr>
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Centro</th>
          @if(Auth::user()->role == 'paciente')
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Veterinario</th>
          @elseif(Auth::user()->role == 'medico')
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Paciente</th>
          @endif
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Fecha</th>
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Hora</th>
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Estado</th>
          <th scope="col" style="background-color: #041E42; color: #00BFB2;">Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach($horascanceladas as $cancelada)
        <tr>
          <td>{{ $cancelada->centrosmedicos->centro }}</td>
          @if(Auth::user()->role == 'medico')
          <td>{{ $cancelada->usuarios->name.' '.$cancelada->usuarios->apellido_paterno.' '.$cancelada->usuarios->apellido_materno }}</td>
          @elseif(Auth::user()->role == 'paciente')
          <td>{{ $cancelada->veterinarios->name.' '.$cancelada->veterinarios->apellido_paterno.' '.$cancelada->veterinarios->apellido_materno }}</td>
          @endif
          <td>{{ $cancelada->fecha }}</td>
          <td>{{ $cancelada->formatHora() }}</td>
          <td><span class="badge mb-5 badge-danger">{{ $cancelada->status }}</span></td>
          <td>
            @if(Auth::user()->role == 'medico' || Auth::user()->role == 'paciente')
            <a href="{{ url('/detalle-horas-canceladas/'.Crypt::encrypt($cancelada->id).'') }}" class="btn btn-warning btn-sm"><i class="mdi mdi-eye"></i> Ver</a>
            @else 
            <a href="{{ url('/detalle-canceladas/'.Crypt::encrypt($cancelada->id).'') }}" class="btn btn-warning btn-sm"><i class="mdi mdi-eye"></i> Ver</a>
            @endif
              
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>