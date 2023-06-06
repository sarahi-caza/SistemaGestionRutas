@extends('adminlte::page')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
            <h2> Ruta {{$ruta['nombre']}}</h2>
            <h5>Reasignar Empleados a otra Ruta</h4>
            <div class="col-md-8 form-group">
                <form action="{{ route('rutas.storeReAsignarRuta') }}" method="POST">
                @csrf
                    <input type="hidden" name="ruta_actual" value="{{$ruta['_id']}}">
                    <table class="table table-info table table-sm ">
                    <thead class="table-dark">
                        <tr> 
                            <th style="padding-right:30px">Empleado</th>
                            <th style="padding-right:30px">Rutas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listaEmpleados as $emp)
                        <tr> 
                            <th style="padding-right:30px">{{$emp['nombre'] }} {{$emp['apellido']}}</th>
                            <td>
                                <select name="asig-{{$emp['_id']}}" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    @foreach($rutas as $rt)
                                        <option value="{{$rt['_id']}}" @if($rt['_id'] == $ruta['_id']) selected @endif>{{$rt['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>    
                    </table>
                    <br>
                    <a class="btn btn-info" href="{{ route('rutas.index') }}">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="margin-left:100px">Reasignar</button> 
                </form>
            </div>
            </center>
        </div>
    </div>
</div>

@endsection