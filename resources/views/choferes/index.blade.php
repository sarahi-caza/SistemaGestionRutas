@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="text-align:center">
                <h2>LISTA DE CHOFERES</h2><br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('choferes.create') }}"><i class='fas fa-fw fa-user-plus'></i> Nuevo Chofer </a>
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
                <th>Celular</th>
                <th>Correo Electrónico</th>
                <th>Sector</th>
                <th style="text-align:center; width:150px">Acciones</th>
            </thead>
        </tr>
	    @foreach ($choferes as $chofer)
	    <tr>

	        <td>{{ ++$i }}</td>
	        <td>{{ $chofer->nombre }}</td>
	        <td>{{ $chofer->apellido }}</td>
            <td>{{ $chofer->celular }}</td>
            <td>{{ $chofer->correo }}</td>
            <td>{{ $chofer->sector }}</td>
	        <td>
                <form action="{{ route('choferes.destroy',$chofer->id) }}" method="POST">
                    <a title="Mostrar" class="btn btn-info" href="{{ route('choferes.show',$chofer->id) }}"><i class="fas fa-eye"></i></a>
                    <a title="Editar"class="btn btn-primary" href="{{ route('choferes.edit',$chofer->id) }}"><i class="fas fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button title="Eliminar" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection