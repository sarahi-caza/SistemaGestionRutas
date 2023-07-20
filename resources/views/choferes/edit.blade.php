@extends('adminlte::page')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8 card">
            
             <center>
            <h3>Editar Datos Personales Chofer</h3><br>
            <div class="col-md-8 form-group">
                <form action="{{ route('choferes.update',$chofer->id) }}" method="POST">
    	        @csrf
                @method('PUT')
                <table>
                        <tr> 
                            <th style="padding-right:30px">Nombre <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" onkeypress="return soloLetras(event)" value="{{ $chofer->nombre }}" name="nombre" class="form-control" placeholder="Nombre" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Apellido <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" onkeypress="return soloLetras(event)" value="{{ $chofer->apellido }}" name="apellido" class="form-control" placeholder="Apellido" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Cédula <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" onkeypress="return event.charCode>=48 && event.charCode<=57" value="{{ $chofer->cedula }}" name="cedula" class="form-control" placeholder="Cédula" minlength="10" maxlength="10" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Celular <label style='color:red'>*</label></th>
                            <td>
                                <input type="text" onkeypress="return event.charCode>=48 && event.charCode<=57" pattern="^09\d{8}$" value="{{ $chofer->celular }}" name="celular" class="form-control" placeholder="0987654321" minlength="10" maxlength="10" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Correo Electrónico <label style='color:red'>*</label></th>
                            <td>
                                <input type="email" value="{{ $chofer->correo }}" name="correo" class="form-control" placeholder="nombre@ejemplo.com" required>
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Sector <label style='color:red'>*</label></th>
                            <td>
                                <select name="sector" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" required>
                                    <option value="Norte" @if($chofer->sector == "Norte") selected @endif>Norte</option>
                                    <option value="Sur" @if($chofer->sector == "Sur") selected @endif>Sur</option>
                                    <option value="Centro" @if($chofer->sector == "Centro") selected @endif>Centro</option>
                                    <option value="Valle" @if($chofer->sector == "Valle") selected @endif>Valle de los Chillos</option>
                                </select>
                            </td>
                        </tr>
                </table>
                <label style='color:red'>*</label> son campos obligatorios <br><br>
                        
                    <a class="btn btn-info" href="{{ route('choferes.index') }}"> Regresar</a>
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