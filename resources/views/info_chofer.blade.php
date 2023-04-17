@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
                <h3>Datos Personales Chofer</h3>
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
                            <th style="padding-right:30px">Celular</th>
                            <td>
                                <input type="text" name="celular" class="form-control" placeholder="Celular">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Ruta Asignada</th>
                            <td>
                                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="1">Ruta Norte</option>
                                    <option value="3">Ruta Sur</option>
                                    <option value="3">Ruta Valle de los Chillos</option>
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
