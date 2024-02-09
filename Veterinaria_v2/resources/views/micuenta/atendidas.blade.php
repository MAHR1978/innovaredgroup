<div class="table-responsive">
<table class="table atendidas" id="ListadoCan">
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
      @foreach($horasatendidas as $atendidas)
    <tr>
      <td>{{ $atendidas->centrosmedicos->centro }}</td>
      @if(Auth::user()->role == 'medico')
      <td>{{ $atendidas->usuarios->name.' '.$atendidas->usuarios->apellido_paterno.''.$atendidas->usuarios->apellido_materno }}</td>
      @elseif(Auth::user()->role == 'paciente')
      <td>{{ $atendidas->veterinarios->name.' '.$atendidas->veterinarios->apellido_paterno.' '.$atendidas->veterinarios->apellido_materno }}</td>
      @endif
      <td>{{ $atendidas->fecha }}</td>
      <td>{{ $atendidas->formatHora() }}</td>
      <td><span class="badge mb-5 badge-success">{{ $atendidas->status }}</span></td>
      <td>
          <a href="{{ url('/horas-atendidas/'.Crypt::encrypt($atendidas->atencion_id).'') }}" class="btn btn-warning btn-sm"><i class="mdi mdi-eye"></i> Ver</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>