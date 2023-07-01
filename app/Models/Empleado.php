<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Empleado extends Eloquent
{
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
        'actualizarUbicacion'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   
}

