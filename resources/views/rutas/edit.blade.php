@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
            <center>
            <h3>Editar Datos Personales Empleado</h3><br>
            <div class="col-md-8 form-group">
                <form action="{{ route('empleados.update',$empleado->id) }}" method="POST">
    	        @csrf
                @method('PUT')
                    <table>
                        <tr> 
                            <th style="padding-right:30px">Nombre</th>
                            <td>
                                <input type="text" value="{{ $empleado->nombre }}" name="nombre" class="form-control" placeholder="Nombre">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Apellido</th>
                            <td>
                                <input type="text" value="{{ $empleado->apellido }}" name="apellido" class="form-control" placeholder="Apellido">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Dirección</th>
                            <td>
                                <input type="text" value="{{ $empleado->direccion }}" name="direccion" class="form-control" placeholder="Dirección">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Celular</th>
                            <td>
                                <input type="text" value="{{ $empleado->celular }}" name="celular" class="form-control" placeholder="Celular">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Género</th>
                            <td>
                                <select name="genero" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="F" @if($empleado->genero == "F") selected @endif> Femenino</option>
                                    <option value="M" @if($empleado->genero == "M") selected @endif> Masculino</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Área</th>
                            <td>
                                <select name="area" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="twr" @if($empleado->area == "twr") selected @endif> TWR Torre de control</option>
                                    <option value="app" @if($empleado->area == "app") selected @endif>APP Vigilancia Radar</option>
                                    <option value="met" @if($empleado->area == "met") selected @endif>MET Meteorología</option>
                                    <option value="ops" @if($empleado->area == "ops") selected @endif>OPS Operaciones</option>
                                    <option value="ais" @if($empleado->area == "ais") selected @endif>AIS Información de Vuelo</option>
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