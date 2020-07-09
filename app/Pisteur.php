<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pisteur extends Model
{

    protected $hidden = [
                            /*'id',*/
                            'login',
                            'motdepasse',
                            'updated_at',
                            'created_at'
                        ];

    public function ventes()
    {
        return $this->hasMany('App\Vente');
    }
}
