<table class="table table-info table table-sm">
    <tr class="table-dark"> 
        <th style="background-color:black">Nombre</th>
        @if((isset($area) && $area != '') || $rutaDb == null)
        <th style="background-color:black">Cédula</th>
        @endif
        <th style="background-color:black">Área</th>
        @if((isset($area) && $area != '') || $rutaDb == null)
        <th style="background-color:black">Celular</th>
        @endif
        @if($rutaDb != null)
        <th style="background-color:black">Ruta</th>
        @endif
        <th style="background-color:black">Estado</th>
    
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
        <td>
            @if(isset($emp['deleted_at']))
                Inactivo
            @else
                Activo
            @endif
        </td>
    </tr>
    @endforeach
</table>
<link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
