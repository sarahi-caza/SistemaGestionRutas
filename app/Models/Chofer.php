<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Chofer extends Eloquent
{
	//use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'choferes';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'celular',
        'sector',
    ];
}
