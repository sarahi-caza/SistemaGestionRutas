<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class ConfirmacionRuta extends Eloquent
{
    use SoftDeletes;
	protected $connection = 'mongodb';
	protected $collection = 'confirm_rutas';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_asig_ruta',
        'semana', 
        'confirmacion_empleado', //array de objeto con id empleado, lunes.....domingo (true false)       
    ];
}