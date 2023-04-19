@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
                <h3>Datos Personales Empleado</h3>
                <div class="col-md-8 form-group">
                <form action="{{ route('empleados.store') }}" method="POST">
                @csrf
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
                                <select name="genero" value="{{ $empleado->genero }}" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Área</th>
                            <td>
                                <select name="area" value="{{ $empleado->area }}" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="twr">TWR Torre de control</option>
                                    <option value="app">APP Vigialncia Radar</option>
                                    <option value="met">MET Meteorología</option>
                                    <option value="ops">OPS Operaciones</option>
                                    <option value="ais">AIS Información de Vuelo</option>
                                </select>
                            </td>
                        </tr>
                        
                    </table>

                    <br>
                   
                    <button type="submit" class="btn btn-primary" style="margin-left:100px">{{ __('Guardar') }}</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection