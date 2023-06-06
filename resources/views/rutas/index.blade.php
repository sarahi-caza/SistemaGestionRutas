@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="text-align:center">
                <h2>LISTA DE RUTAS</h2><br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rutas.create') }}"><i class='fas fa-fw fa-user-plus'></i> Nueva Ruta </a>
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
                <th style="text-align:center">N°</th>
                <th>Nombre</th>
                <th>Chofer</th>
                <th style="text-align:center" >Empleados Asignados</th>
                <th style="text-align:center; width:125px">Acciones</th>
            </thead>
        </tr>
	    @foreach ($rutas as $ruta)
	    <tr>

	        <td style="text-align:center; width: 10%">{{ ++$i }}</td>
	        <td style="width: 25%">{{ $ruta->nombre }}</td>
	        <td style="width: 25%">{{ $ruta->chofer }}</td>
            <td style="text-align:center; width: 20%">{{ $ruta->numEmpleados }}</td>
            <td style="text-align:right">
                <form action="{{ route('rutas.destroy',$ruta->id) }}" method="POST">
                    @if($ruta->numEmpleados != 0)
                    <a title="ReAsignar" class="btn btn-secondary" href="{{ route('rutas.reAsignarRuta',$ruta->id) }}"><i class="fas fa-tasks"></i></a>
                    @endif
                    <a title="Mostrar" class="btn btn-info" href="{{ route('rutas.show',$ruta->id) }}"><i class="fas fa-eye"></i></a>
                    <a title="Editar"class="btn btn-primary" href="{{ route('rutas.edit',$ruta->id) }}"><i class="fas fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button title="Eliminar" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection