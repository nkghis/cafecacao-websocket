<?php

namespace App\Http\Controllers;

use App\Vente;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        /*$ventes = Vente::orderBy('id', 'desc')->take(5)->get();

        foreach ($ventes as $v)
        {
            $vente = [
                'id' => $v->id,
                'poids'=>$v->poids,
                'montant' => $v->montant,
                'date' => $v->created_at->format('d-m-Y H:i:s'),
                'pisteur' => $v->pisteur->nom.' '.$v->pisteur->prenom,
                'producteur' => $v->producteur->nom.' '.$v->producteur->prenom,
                'cooperative' => $v->producteur->cooperative->libelle,
                'produit' => $v->produit->libelle
            ];

            $mesventes[] = $vente;


        }*/

        //dd($ventes);
        //return view('dashboard', ['mesventes' => $ventes]);
        return view('dashboard'/*, compact('mesventes')*/);
    }
}
