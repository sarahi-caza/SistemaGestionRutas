@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
             <center>
            <h3>Datos Personales Chofer</h3><br>
            <div class="col-md-8 form-group">
                <form action="{{ route('choferes.store') }}" method="POST">
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
                            <th style="padding-right:30px">Celular</th>
                            <td>
                                <input type="text" name="celular" class="form-control" placeholder="Celular">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Correo Electrónico</th>
                            <td>
                                <input type="text" name="correo" class="form-control" placeholder="Correo Ëlectronico">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Sector</th>
                            <td>
                                <select name="sector" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="Norte">Norte</option>
                                    <option value="Sur">Sur</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Valle">Valle de los Chillos</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                        <br>
                        <a class="btn btn-info" href="{{ route('choferes.index') }}">Regresar</a>
                        <button type="submit" class="btn btn-primary" style="margin-left:100px">Guardar</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection