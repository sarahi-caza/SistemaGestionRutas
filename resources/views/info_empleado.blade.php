@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
                <h3>Datos Personales Empleado</h3>
                <div class="col-md-8 form-group">
                    <table>
                        <tr> 
                            <th style="padding-right:30px">Nombre</th>
                            <td>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Apellido</th>
                            <td>
                                <input type="text" name="Apellido" class="form-control" placeholder="Apellido">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Dirección</th>
                            <td>
                                <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Celular</th>
                            <td>
                                <input type="text" name="celular" class="form-control" placeholder="Celular">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Género</th>
                            <td>
                                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="1">Femenino</option>
                                    <option value="3">Masculino</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Área</th>
                            <td>
                                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="1">TWR Torre de control</option>
                                    <option value="3">APP Vigialncia Radar</option>
                                    <option value="1">MET Meteorología</option>
                                    <option value="3">OPS Operaciones</option>
                                    <option value="3">AIS Información de Vuelo</option>
                                </select>
                            </td>
                        </tr>
                        
                    </table>
                    <br>
                    <button class="btn btn-primary" style="margin-right:100px;" >Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>    
                </div>
            </center>
        </div>
    </div>
</div>
@endsection
