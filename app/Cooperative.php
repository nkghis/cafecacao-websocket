<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function producteurs()
    {
        return $this->hasMany('App\Producteur');
    }
}
