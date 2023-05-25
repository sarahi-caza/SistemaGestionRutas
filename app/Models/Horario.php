<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Horario extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'horarios';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha',
        'turno_semanal'
    ];
}