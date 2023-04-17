@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
                <h3>Ingrese Nuevo Horario de Trabajo</h3>
                <div class="col-md-8 form-group">
                    <table>
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
                    <button class="btn btn-primary" style="margin-right:100px;" > <-- Regresar</button>
                   
                </div>
            </center>
        </div>
    </div>
</div>
@endsection
