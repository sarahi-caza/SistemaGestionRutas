@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="text-align:center">
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


    <table class="table table-info table table-sm">
        <tr>
            <thead class="table-dark">
                <th>N°</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Dirección</th>
                <th>Celular</th>
                <th>Área</th>
                <th style="text-align:center; width:150px">Acciones</th>
            </thead>
        </tr>
	    @foreach ($empleados as $empleado)
	    <tr>

	        <td>{{ ++$i }}</td>
	        <td>{{ $empleado->nombre }}</td>
	        <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->cedula }}</td>
            <td>{{ $empleado->direccion }}</td>
            <td>{{ $empleado->celular }}</td>
	        <td>{{ $empleado->area }}</td>
	        <td>
                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                    <a title="Mostrar" class="btn btn-info" href="{{ route('empleados.show',$empleado->id) }}"><i class="fas fa-eye"></i></a>
                    <a title="Editar"class="btn btn-primary" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fas fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button title="Eliminar" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection