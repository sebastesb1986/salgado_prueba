@extends('layout.app')

@section('title', 'Lista de empleados')

@section('content')

    <div class="py-3 text-left">
        <h2>Lista de empleados</h2>
    </div>

    <div class="py-3 text-right">
        <a href="{{ route('crear') }}" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">
            <i class="fa fa-user-plus"></i> Crear
        </a>
    </div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><i class="fa fa-user"></i> Nombre</th>
      <th scope="col"><i class="fa fa-edit"></i> Email</th>
      <th scope="col"><i class="fa fa-venus-mars"></i> Sexo</th>
      <th scope="col"><i class="fa fa-briefcase"></i> Area</th>
      <th scope="col"><i class="fa fa-envelope"></i> Boletín</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->nombre }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->sexo }}</td>
            <td>{{ $employee->areas->nombre }}</td>
            <td>{{ $employee->boletin == 1 ? 'Si' : 'No' }}</td>
            <td>     <a href="{{ route('modificar', $employee->id) }}" class="btn" tabindex="-1" role="button" aria-disabled="true">
                <i class="fa fa-edit"></i> 
            </a></td>
            <td><button type="button" class="btn" value="$employee->id"><i class="fa fa-trash" onClick="Delete();"></i></button></td>
        </tr>
    @endforeach
  </tbody>
</table>


@stop

@push('styles')

@endpush

@push('scripts')

<script>

    function Delete(btn)
    {
          let route = "delete/"+btn.value;
          let note = confirm('¿Esta seguro que desea eliminar este empleado?');
          if(note){
            $.ajax({ 
              url: route, 
              type: 'DELETE', 
              dataType: 'json', 
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} 
            })
            .then(response => {
                // Cargar();
            })
            .catch(error => {
                // handle error
                console.log(error);
            });
            
          }
    }

</script>


@endpush