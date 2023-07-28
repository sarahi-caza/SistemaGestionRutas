@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card">
            <center>
                <br><br><h3>Seleccione filtros para el reporte</h3><br>
                <div class="col-md-12 form-group">
                <form method="POST" action="{{ route('reportes.reporteEmpleado') }}">   
                @csrf 
                    <table>
                        <tr> 
                        <th style="padding-right:15px">Área</th>
                            <td style="padding-top:15px">
                                <select id="area" name="area" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="">Todas</option>
                                    <option value="TWR" @if($area == "TWR") selected @endif> TWR Torre de control</option>
                                    <option value="APP" @if($area == "APP") selected @endif>APP Vigilancia Radar</option>
                                    <option value="MET" @if($area == "MET") selected @endif>MET Meteorología</option>
                                    <option value="OPS" @if($area == "OPS") selected @endif>OPS Operaciones</option>
                                    <option value="AIS" @if($area == "AIS") selected @endif>AIS Información de Vuelo</option>
                                </select>
                            </td>
                        <th style="padding-left:30px; padding-right:15px">Ruta</th>
                        <td style="padding-top:15px">
                            <select id="ruta" name="ruta" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                <option value="">-Seleccione-</option>
                                @foreach($rutas as $rut)
                                    <option value="{{$rut['_id']}}" @if($ruta == $rut['_id']) selected @endif>{{$rut['nombre'] }}</option>
                                @endforeach
                        </td>
                        <td style="padding-left:60px; margin-bottom:5px">
                            <button id="consultar" type="submit" class="btn btn-primary">Consultar</button>
                        </td>
                        </tr>
                      
                    </table>
                    
                    @if(isset($empleadosRep))
                    
                    <table class="table table-info table table-sm">
                        <tr> 
                            <thead class="table-dark">
                                <th>Nombre</th>
                                @if((isset($area) && $area != '') || $rutaDb == null)
                                <th>Cédula</th>
                                @endif
                                <th>Área</th>
                                @if((isset($area) && $area != '') || $rutaDb == null)
                                <th>Celular</th>
                                @endif
                                @if($rutaDb != null)
                                <th>Ruta</th>
                                @endif
                            </thead>
                        </tr>
                        @foreach($empleadosRep as $emp)
                        <tr> 
                            <td>{{$emp['nombre']}} {{$emp['apellido']}}</td>
                            @if((isset($area) && $area != '') || $rutaDb == null)
                            <td>{{$emp['cedula']}}</td>
                            @endif
                            <td>{{$areas[$emp['area']]}}</td>
                            @if((isset($area) && $area != '') || $rutaDb == null)
                            <td>{{$emp['celular']}}</td>
                            @endif
                            @if($rutaDb != null)
                            <td>{{$rutaDb['nombre']}}</td>
                            @endif
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
