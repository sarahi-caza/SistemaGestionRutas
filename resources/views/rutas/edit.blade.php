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
                                <input type="text" value="{{ $ruta->nombre }}" name="nombre" class="form-control" placeholder="Nombre">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Código</th>
                            <td>
                                <input type="text" Value="{{ $ruta->codigo }}" name="codigo" class="form-control" placeholder="Codigo">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Chofer</th>
                            <td>
                                <select name="chofer" value="{{ $ruta->chofer }}" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                        <br>
                        <a class="btn btn-info" href="{{ route('empleados.index') }}"> Regresar</a>
                        <button type="submit" class="btn btn-primary" style="margin-left:100px">Actualizar</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection