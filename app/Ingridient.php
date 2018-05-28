<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingridient extends Model
{
    protected $table = 'ingridients';    
    protected $fillable = [
        'title',        
    ];
}
