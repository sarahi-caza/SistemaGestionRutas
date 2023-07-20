@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
            <center>
            <h3>Datos Personales Chofer</h3><br>
            <div class="col-md-8 form-group">
                @if (count($errors)>0)
                    <div class= "alert alert-danger">
                        @foreach($errors->get('cedula') as $error)
                            {{$error}}<br>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('choferes.store') }}" method="POST">
                @csrf
                <table>
                    <tr> 
                        <th style="padding-right:30px">Nombre <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" name="nombre" onkeypress="return soloLetras(event)" class="form-control" placeholder="Nombre" required>
                            </td>
                    </tr>
                        <tr> 
                            <th style="padding-right:30px">Apellido <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" name="apellido" onkeypress="return soloLetras(event)" class="form-control" placeholder="Apellido" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Cédula <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" name="cedula" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control" placeholder="Cédula" minlength="10" maxlength="10" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Celular <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" name="celular" onkeypress="return event.charCode>=48 && event.charCode<=57" pattern="^09\d{8}$" class="form-control" placeholder="0987654321" minlength="10" maxlength="10" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Correo Electrónico <label style='color:red'>*</label></th>
                            <td>
                                <input type="email" name="correo" class="form-control" placeholder="nombre@ejemplo.com" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Sector <label style='color:red'>*</label></th>
                            <td>
                                <select name="sector" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" required>
                                    <option value="" selected>-Seleccione-</option>
                                    <option value="Norte">Norte</option>
                                    <option value="Sur">Sur</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Valle">Valle de los Chillos</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" id="pwdtemp" name="clave">
                        <label style='color:red'>*</label> son campos obligatorios <br><br>
                        <a class="btn btn-info" href="{{ route('choferes.index') }}">Regresar</a>
                        <button type="submit" class="btn btn-primary" style="margin-left:100px">Guardar</button> 
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $('#pwdtemp').val(Math.random().toString(36).substr(2, 6))
</script>
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