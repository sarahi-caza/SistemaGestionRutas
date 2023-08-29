<table class="table table-info table table-sm">
    <tr class="table-dark"> 
        <th style="background-color:black">Semana</th>    
        <th style="background-color:black">Ruta</th>
        <th style="background-color:black">Empleado</th>
        <th style="background-color:black">Lunes</th>
        <th style="background-color:black">Martes</th>
        <th style="background-color:black">Miercoles</th>
        <th style="background-color:black">Jueves</th>
        <th style="background-color:black">Viernes</th>
        <th style="background-color:black">Sabado</th>
        <th style="background-color:black">Domingo</th>
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
<link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
