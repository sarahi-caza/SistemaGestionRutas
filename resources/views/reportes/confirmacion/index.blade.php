@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card">
            <center>
                <br><br><h3>Seleccione filtros para el reporte</h3><br>
                <div class="col-md-12 form-group">
                <form method="POST" action="{{ route('reportes.reporteConfirmacion') }}">   
                @csrf 
                    <table>
                        <tr>
                            <th style="padding-right:30px">Semana <label style='color:red'>*</label></th>
                            <td style="padding-top:15px">
                                <select id="semana" name="semana" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" required>
                                    <option value="">-Seleccione-</option>
                                    @foreach($semanas as $sem)
                                    <option value="{{$sem}}" @if($semana == $sem) selected @endif>{{$sem}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <th style="padding-left:30px; padding-right:15px">Ruta</th>
                            <td style="padding-top:15px">
                                <select id="ruta" name="ruta" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="">-Seleccione-</option>
                                    @foreach($rutas as $rut)
                                        <option value="{{$rut['_id']}}" @if($ruta == $rut['_id']) selected @endif>{{$rut['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="padding-left:60px; margin-bottom:5px">
                                <button id="consultar" type="submit" class="btn btn-primary">Consultar</button>
                            </td>
                        </tr>
                      
                    </table>
                    
                    @if(isset($choferesRep))
                    
                    <table class="table table-info table table-sm">
                        <tr> 
                            <thead class="table-dark">
                                <th>Empleado</th>
                                <th>Área</th>
                                <th>Ruta</th>
                                <th>Fecha</th>
                                <th>Confirmación</th>
                            </thead>
                        </tr>
                        @foreach($choferesRep as $chof)
                        <tr> 
                            <td>{{$chof['nombre']}} {{$chof['apellido']}}</td>
                            <td>{{$chof['cedula']}}</td>
                            <td>{{$chof['sector']}}</td>
                            <td>{{$chof['celular']}}</td>
                            <td>
                                @if(isset($chof['deleted_at']))
                                    Inactivo
                                @else
                                    Activo
                                @endif
                            </td>
                            <td>{{$chof['created_at']->toDateTime()->format('M Y')}}</td>
                        </tr>
                        @endforeach
                        </table>
                    @endif
                </div>
                  
            </form>
            </center>
            
        </div>
    </div>
</div>

@endsection
