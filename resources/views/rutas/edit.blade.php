@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
            <center>
            <h3>Editar Datos de Ruta</h3><br>
            <div class="col-md-8 form-group">
                <form action="{{ route('rutas.update',$ruta->id) }}" method="POST">
    	        @csrf
                @method('PUT')
                    <table>
                        <tr> 
                            <th style="padding-right:30px">Nombre</th>
                            <td>
                                <input type="text" value="{{ $ruta->nombre }}" name="nombre" class="form-control" placeholder="Nombre" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Chofer</th>
                            <td>
                                <select name="chofer" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    @foreach($choferes as $chof)
                                        <option value="{{$chof['_id']}}" @if($chof['_id']==$ruta->chofer) selected @endif>{{$chof['nombre'] }} {{$chof['apellido']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>

                        <br>
                        <a class="btn btn-info" href="{{ route('rutas.index') }}"> Regresar</a>
                        <button type="submit" class="btn btn-primary" style="margin-left:100px">Actualizar</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection