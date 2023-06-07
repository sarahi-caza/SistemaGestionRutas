<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class AsignacionRuta extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'asig_rutas';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_empleado',
        'id_ruta',        
    ];
}