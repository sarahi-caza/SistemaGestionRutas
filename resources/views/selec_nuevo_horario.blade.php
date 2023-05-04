@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
                <br><br><h3>Ingrese Nuevo Horario de Trabajo</h3><br><br>
                <div class="col-md-8 form-group">
                    <table>
                        <tr> 
                        <th style="padding-right:30px">Área</th>
                            <td>
                                <select name="horario" onchange="location = this.value" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="nuevo_horario">TWR Torre de control</option>
                                    <option value="nuevo_horario">APP Vigialncia Radar</option>
                                    <option value="nuevo_horario">MET Meteorología</option>
                                    <option value="nuevo_horario">OPS Operaciones</option>
                                    <option value="nuevo_horario">AIS Información de Vuelo</option>
                                </select>
                            </td>
                        </tr>
                       
                    </table>
                    <br>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection
