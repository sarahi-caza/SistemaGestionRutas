@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
             <center>
            <h3>Datos Personales Empleado</h3><br>
            <div class="col-md-8 form-group">
                <form action="{{ route('empleados.store') }}" method="POST">
                @csrf
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
                                <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Cédula</th>
                            <td>
                                <input type="text" name="cedula" class="form-control" placeholder="Cédula" maxlength="10"> 
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
                                <input type="text" name="celular" class="form-control" placeholder="Celular" maxlength="10">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Área</th>
                            <td>
                                <select name="area" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="TWR">TWR Torre de control</option>
                                    <option value="APP">APP Vigilancia Radar</option>
                                    <option value="MET">MET Meteorología</option>
                                    <option value="OPS">OPS Operaciones</option>
                                    <option value="AIS">AIS Información de Vuelo</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" id="pwdtemp" name="clave">
                        <br>
                        <a class="btn btn-info" href="{{ route('empleados.index') }}">Regresar</a>
                        <button type="submit" class="btn btn-primary" style="margin-left:100px">Guardar</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $('#pwdtemp').val(Math.random().toString(36).substr(2, 6))
</script>
@endsection