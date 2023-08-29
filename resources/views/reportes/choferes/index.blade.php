@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card">
            <center>
                <br><br><h3>Seleccione filtros para el reporte</h3><br>
                <div class="col-md-12 form-group">
                <form method="POST" action="{{ route('reportes.reporteChofer') }}">   
                @csrf 
                    <table>
                        <tr> 
                            <th style="padding-right:15px">Sector</th>
                            <td style="padding-top:15px">
                                <select id="sector" name="sector" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="">Todos</option>
                                    <option value="Norte" @if($sector == "Norte") selected @endif>Norte</option>
                                    <option value="Sur" @if($sector == "Sur") selected @endif>Sur</option>
                                    <option value="Centro" @if($sector == "Centro") selected @endif>Centro</option>
                                    <option value="Valle" @if($sector == "Valle") selected @endif>Valle de los Chillos</option>    
                                </select>
                            </td>
                            <th style="padding-left:30px; padding-right:15px">Estado</th>
                            <td style="padding-top:15px">
                                <select id="estado" name="estado" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="">Todos</option>
                                    <option value="A" @if($estado == "A") selected @endif>Activo</option>
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
                                <th>Nombre</th>
                                <th>Cédula</th>
                                <th>Sector</th>
                                <th>Celular</th>
                                <th>Estado</th>
                                <th>Fecha Ingreso</th>
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
                    @if($sector=='' && $estado=='')
                    <a href="{{ route('reportes.reporteChoferPdf')}}">
                    @elseif($estado=='')
                    <a href="{{ route('reportes.reporteChoferPdf')}}/{{$sector}}/estado">
                    @elseif($sector=='')
                    <a href="{{ route('reportes.reporteChoferPdf')}}/sector/{{$estado}}">
                    @else
                    <a href="{{ route('reportes.reporteChoferPdf')}}/{{$sector}}/{{$estado}}">
                    @endif
                        <button id="descargar" type="button" class="btn btn-success">Descargar PDF</button>
                    </a>
                @endif
                </div>
            </form>
            </center>
        </div>
    </div>
</div>
@endsection
