
@extends('empleados.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTA DE EMPLEADOS</h2><br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('empleados.create') }}"><i class='fas fa-fw fa-user-plus'></i> Nuevo Empleado </a>
            </div>
            <br>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-info table table-sm ">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Celular</th>
            <th>Genero</th>
            <th>Area</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($empleados as $empleado)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $empleado->nombre }}</td>
	        <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->direccion }}</td>
            <td>{{ $empleado->celular }}</td>
	        <td>{{ $empleado->genero }}</td>
            <td>{{ $empleado->area }}</td>
	        <td>
                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('empleados.show',$empleado->id) }}"><i class="fas fa-eye"></i> Show</a>
                    <a class="btn btn-primary" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fas fa-edit"></i> Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection