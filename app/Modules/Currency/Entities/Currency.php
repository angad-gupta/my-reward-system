<?php

namespace App\Modules\Currency\Entities;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $fillable = [

    	'name',
    	'value',

    ];
    
}
