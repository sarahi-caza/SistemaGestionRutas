@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <center>
                <h3>Ingrese Nuevo Horario de Trabajo</h3>
                <div class="col-md-12 form-group table-responsive">
                <form action="{{ route('horarios.store') }}" method="POST">
                @csrf
                    <table>
                            <tr> 
                                <th style="padding-right:30px">Área</th>
                                <td style="padding-right:40px">
                                    <select name="horario" onchange="location = this.value" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" readonly>
                                        <option value="TWR" @if($area == "TWR") selected @endif>TWR Torre de control</option>
                                        <option value="APP" @if($area == "APP") selected @endif>APP Vigilancia Radar</option>
                                        <option value="MET" @if($area == "MET") selected @endif>MET Meteorología</option>
                                        <option value="OPS" @if($area == "OPS") selected @endif>OPS Operaciones</option>
                                        <option value="AIS" @if($area == "AIS") selected @endif>AIS Información de Vuelo</option>
                                    </select>
                                    </td>
                                <th style="padding-right:30px">Seleccione Semana</th>
                                <td style="padding-right:30px">
                                <input type="text" name="fecha" class="daterange" style="width:200px" readonly>
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
                                @foreach($empleados as $emp)
                                <tr>
                                    <th>{{$emp['nombre'] }} {{$emp['apellido']}}</th>
                                    <td>
                                        <select name="lu-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ma-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="mi-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ju-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="vi-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="sa-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="do-{{$emp['_id'] }}" class="form-select form-select-sm mb-1 form-control">
                                            <option value= 'L'>Libre</option>
                                            <option value= 'M'>Mañana</option>
                                            <option value= 'N'>Noche</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                                
                        </table>
                        <br>
                        <a class="btn btn-info" href="{{ route('horarios.select_area') }}" style="margin-right:50px" >Cancelar </a>
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
