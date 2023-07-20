@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
            <center>
            <h3>Editar Datos Personales Empleado</h3><br>
            <div class="col-md-8 form-group">
                <form action="{{ route('empleados.update',$empleado->id) }}" method="POST">
    	        @csrf
                @method('PUT')
                    <table>
                        <tr> 
                            <th style="padding-right:30px">Nombre <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" onkeypress="return soloLetras(event)" value="{{ $empleado->nombre }}" name="nombre" class="form-control" placeholder="Nombre" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Apellido <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" onkeypress="return soloLetras(event)" value="{{ $empleado->apellido }}" name="apellido" class="form-control" placeholder="Apellido" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Cédula <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" value="{{ $empleado->cedula }}" name="cedula" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control" placeholder="Cédula" minlength="10" maxlength="10" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Dirección <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" value="{{ $empleado->direccion }}" name="direccion" class="form-control" placeholder="Dirección" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Correo Electrónico <label style='color:red'>*</label></th>
                            <td>
                                <input type="email" value="{{ $empleado->correo }}" name="correo" class="form-control" placeholder="nombre@ejemplo.com" required>
                            </td>
                        </tr>
                        
                        <tr> 
                            <th style="padding-right:30px">Celular <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" value="{{ $empleado->celular }}" name="celular" onkeypress="return event.charCode>=48 && event.charCode<=57" pattern="^09\d{8}$" class="form-control" placeholder="0987654321" minlength="10" maxlength="10" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Área <label style='color:red'>*</label></th>
                            <td>
                                <select name="area" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="TWR" @if($empleado->area == "TWR") selected @endif> TWR Torre de control</option>
                                    <option value="APP" @if($empleado->area == "APP") selected @endif>APP Vigilancia Radar</option>
                                    <option value="MET" @if($empleado->area == "MET") selected @endif>MET Meteorología</option>
                                    <option value="OPS" @if($empleado->area == "OPS") selected @endif>OPS Operaciones</option>
                                    <option value="AIS" @if($empleado->area == "AIS") selected @endif>AIS Información de Vuelo</option>
                                </select>
                            </td>
                        </tr>
                        
                    </table>
                    <label style='color:red'>*</label> son campos obligatorios <br><br>
                    <a class="btn btn-info" href="{{ route('empleados.index') }}"> Regresar</a>
                    <button type="submit" class="btn btn-primary" style="margin-left:100px">Actualizar</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<script>
  function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
</script>

@endsection