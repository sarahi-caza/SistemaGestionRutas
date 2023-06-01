@extends('adminlte::page')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="text-align:center">
                <h2>HISTORIAL DE HORARIOS</h2><br>
            </div>
            
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-info table table-sm" >
        <tr>
            <thead class="table-dark">
                <th style="text-align:center; width:10%">N°</th>
                <th style="text-align:center; width:40%">Fecha</th>
                <th style="text-align:center; width:25%">Área</th>
                <th style="text-align:center; width:300px">Acciones</th>
            </thead>
        </tr>
        @foreach ($horarios as $horario)
	    <tr>

	        <td style="text-align:center">{{ ++$i }}</td>
	        <td style="text-align:center">{{ $horario->fecha }}</td>
	        <td style="text-align:center">{{ $horario->area }}</td>
            <td style="text-align:center">
                <form action="{{ route('horarios.destroy',$horario->id) }}" method="POST">
                    <a title="Mostrar" class="btn btn-info" href="{{ route('horarios.show',$horario->id) }}"><i class="fas fa-eye"></i></a>
                    <a title="Editar"class="btn btn-primary" href="{{ route('horarios.edit',$horario->id) }}"><i class="fas fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button title="Eliminar" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

@endsection