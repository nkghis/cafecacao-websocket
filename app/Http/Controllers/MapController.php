<?php

namespace App\Http\Controllers;

use App\Vente;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public  function index ($id)
    {

        $ventes = Vente::find($id);
        //$ventes = Vente::orderBy('id', 'desc')->take(5)->get();

        //dd($ventes);

        $v = [
            'latitude' => $ventes->latitude,
            'longitude'=>$ventes->longitude
        ];

        $vente[] = $v;
        return view('maps.index', compact('vente'));
    }
}
