<table class="table table-info table table-sm">
    <tr class="table-dark" style="background-color:black"> 
            <th style="background-color:black">Nombre</th>
            <th style="background-color:black">Cédula</th>
            <th style="background-color:black">Sector</th>
            <th style="background-color:black">Celular</th>
            <th style="background-color:black">Estado</th>
            <th style="background-color:black">Fecha Ingreso</th>
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
<link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
