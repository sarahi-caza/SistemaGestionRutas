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
                            <th style="padding-right:30px">Nombre</th>
                            <td>
                                <input type="text" value="{{ $chofer->nombre }}" name="nombre" class="form-control" placeholder="Nombre">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Apellido</th>
                            <td>
                                <input type="text" value="{{ $chofer->apellido }}" name="apellido" class="form-control" placeholder="Apellido">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Celular</th>
                            <td>
                                <input type="text" value="{{ $chofer->celular }}" name="celular" class="form-control" placeholder="Celular">
                            </td>
                        </tr>
                        <tr> 
                            <th style="padding-right:30px">Sector</th>
                            <td>
                                <select name="sector" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                    <option value="Norte" @if($chofer->sector == "Norte") selected @endif>Norte</option>
                                    <option value="Sur" @if($chofer->sector == "Sur") selected @endif>Sur</option>
                                    <option value="Centro" @if($chofer->sector == "Centro") selected @endif>Centro</option>
                                    <option value="Valle" @if($chofer->sector == "Valle") selected @endif>Valle de los Chillos</option>
                                </select>
                            </td>
                        </tr>
                </table>
                    <br>
                    <a class="btn btn-info" href="{{ route('choferes.index') }}"> Regresar</a>
                    <button type="submit" class="btn btn-primary" style="margin-left:100px">Actualizar</button> 
                </form>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection