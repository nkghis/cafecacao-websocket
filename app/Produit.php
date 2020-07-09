<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function ventes()
    {
        return $this->hasMany('App\Vente');
    }
}
