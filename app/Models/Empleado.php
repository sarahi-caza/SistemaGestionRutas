<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Empleado extends Eloquent
{
    use SoftDeletes;
	protected $connection = 'mongodb';
	protected $collection = 'empleados';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'direccion',
        'correo',
        'celular',
        'area',
        'clave',
        'actualizarClave',
        'actualizarUbicacion',
        'ubicacion',
        'tokenCelular'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   
}

