@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            <center>
                <h3>Seleccione Área para Nuevo Horario de Trabajo</h3>
                <div class="col-md-12 form-group">
                    <table>
                        <tr> 
                        <th style="padding-right:40px">Área</th>
                            <td>
                                <select id="horario" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option selected>-Seleccione-</option>
                                    <option value="{{ route('horarios.nuevo_horario', 'TWR') }}">TWR Torre de control</option>
                                    <option value="{{ route('horarios.nuevo_horario', 'APP') }}">APP Vigilancia Radar</option>
                                    <option value="{{ route('horarios.nuevo_horario', 'MET') }}">MET Meteorología</option>
                                    <option value="{{ route('horarios.nuevo_horario', 'OPS') }}">OPS Operaciones</option>
                                    <option value="{{ route('horarios.nuevo_horario', 'AIS') }}">AIS Información de Vuelo</option>
                                </select>
                            </td>
                        </tr>
                       
                    </table>
                    <br>
                </div>
            </center>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $('#horario').on('change', function (e) {
        console.log('hola22')
        var link = $("option:selected", this).val();
        if (link) {
            location.href = link;
        }
    });
</script>
@endsection
