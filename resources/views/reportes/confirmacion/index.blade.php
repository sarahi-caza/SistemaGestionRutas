@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
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
                                    <option value="">Todas</option>
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
                    
                    @if(isset($confirmRuta))
                    <table class="table table-info table table-sm">
                        <tr> 
                            <thead class="table-dark">
                                <th>Semana</th>    
                                <th>Ruta</th>
                                <th>Empleado</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sabado</th>
                                <th>Domingo</th>
                            </thead>
                        </tr>
                        @foreach($confirmRuta as $conf)
                            @foreach($conf['confirmacion_empleado'] as $emp)
                            <tr>
                                <td>{{$conf['semana']}}</td>
                                <td>{{$rutasArray[(string)$conf['id_asig_ruta']]}}</td>
                            
                                <td>{{$empleadosArray[$emp['empleado']]}}</td>
                                <td>@if($emp['lunes']) SI @elseif($emp['lunes']=== NULL) N/A @else NO @endif</td>
                                <td>@if($emp['martes']) SI @elseif($emp['martes']=== NULL) N/A @else NO @endif</td>
                                <td>@if($emp['miercoles']) SI @elseif($emp['miercoles']=== NULL) N/A @else NO @endif</td>
                                <td>@if($emp['jueves']) SI @elseif($emp['jueves']=== NULL) N/A @else NO @endif</td>
                                <td>@if($emp['viernes']) SI @elseif($emp['viernes']=== NULL) N/A @else NO @endif</td>
                                <td>@if($emp['sabado']) SI @elseif($emp['sabado']=== NULL) N/A @else NO @endif</td>
                                <td>@if($emp['domingo']) SI @elseif($emp['domingo']=== NULL) N/A @else NO @endif</td>
                            </tr>   
                            @endforeach
                        
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
