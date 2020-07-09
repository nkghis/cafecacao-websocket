<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producteur extends Model
{

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function cooperative()
    {
        return $this->belongsTo('App\Cooperative');
    }

    public function ventes()
    {
        return $this->hasMany('App\Vente');
    }
}
