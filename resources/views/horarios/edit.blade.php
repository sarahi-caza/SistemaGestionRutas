@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <center>
                <h3>Edite Horario de Trabajo</h3>
                <div class="col-md-12 form-group table-responsive">
                <form action="{{ route('horarios.update', $horario) }}" method="POST">
                @csrf
                @method('PUT')
                    <table>
                            <tr> 
                                <th style="padding-right:30px">Área</th>
                                <td style="padding-right:40px">
                                    <select name="area" onchange="location = this.value" class="form-select form-select-lg mb-3 form-control"  disabled>
                                        <option value="TWR" @if($horario->area == "TWR") selected @endif>TWR Torre de control</option>
                                        <option value="APP" @if($horario->area == "APP") selected @endif>APP Vigilancia Radar</option>
                                        <option value="MET" @if($horario->area == "MET") selected @endif>MET Meteorología</option>
                                        <option value="OPS" @if($horario->area == "OPS") selected @endif>OPS Operaciones</option>
                                        <option value="AIS" @if($horario->area == "AIS") selected @endif>AIS Información de Vuelo</option>
                                    </select>
                                    <input type="hidden" name="horario" value= "{{$horario->area}}">
                                    </td>
                                <th style="padding-right:30px">Seleccione Semana</th>
                                <td style="padding-right:30px">
                                <input type="text" name="fecha" value="{{$horario->fecha}}" class="daterange form-control" style="width:200px" disabled>
                                </td>
                            </tr>

                        </table><br>
                        <table class="table table-info table table-sm ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" >Empleado</th>
                                    <th scope="col" >Lunes</th>
                                    <th scope="col" >Martes</th>
                                    <th scope="col" >Miércoles</th>
                                    <th scope="col" >Jueves</th>
                                    <th scope="col" >Viernes</th>
                                    <th scope="col" >Sábado</th>
                                    <th scope="col" >Domingo</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($horario->turno_semanal as $turno)
                                <tr>
                                    <th>{{$empleadosArray[''.$turno['empleado']]}}</th>
                                    <td>
                                        <select name="lu-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['lunes']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['lunes']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['lunes']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ma-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['martes']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['martes']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['martes']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="mi-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['miercoles']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['miercoles']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['miercoles']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ju-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['jueves']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['jueves']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['jueves']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="vi-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['viernes']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['viernes']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['viernes']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="sa-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['sabado']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['sabado']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['sabado']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="do-{{$turno['empleado']}}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L' @if($turno['domingo']== "L") selected @endif>Libre</option>
                                            <option value= 'M' @if($turno['domingo']== "M") selected @endif>Mañana</option>
                                            <option value= 'N' @if($turno['domingo']== "N") selected @endif>Noche</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <br>
                        <a class="btn btn-info" href="{{ route('horarios.historial') }}" style="margin-right:50px" >Regresar </a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>    
                </div>
            </center>
        </div>
    </div>
</div>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    
    <script type="text/javascript">
	$('.daterange').daterangepicker({
        
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizado",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Deciembre"
        ],
        "firstDay": 1
    }
    });
</script> 
@endsection
