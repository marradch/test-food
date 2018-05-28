<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodIngridient extends Model
{
    protected $table = 'foods_igridients';    
    protected $fillable = [
        'food_id',        
		'ingridient_id',
		'ingridient_count'
    ];
	public function ingridient()
    {
        return $this->belongsTo('App\Ingridient');
    }
}
