<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function producteur()
    {
        return $this->belongsTo('App\Producteur');
    }


    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }

    public function pisteur()
    {
        return $this->belongsTo('App\Pisteur');
    }
}
