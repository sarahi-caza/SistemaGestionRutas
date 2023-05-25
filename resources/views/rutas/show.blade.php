@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
             <center>
            <h3>Mostrar Datos de Ruta</h3><br>
            <div class="col-md-8 form-group">
                    <table>
                    <tr> 
                            <th style="padding-right:30px">Nombre</th>
                            <td>
                                <input type="text" value="{{ $ruta->nombre }}" name="nombre" class="form-control" placeholder="Nombre" readonly>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Chofer</th>
                            <td>
                                <select name="chofer" value="{{ $ruta->chofer }}" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" disabled>
                                    <option selected>-Seleccione-</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </td>
                        </tr>    
                    </table>

                        <br>
                        <a class="btn btn-info" href="{{ route('rutas.index') }}">Regresar</a>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection