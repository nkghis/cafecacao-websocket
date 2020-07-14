<?php

namespace App\Http\Controllers;

use App\Events\VenteEvent;
use App\Vente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vente = Vente::all();
        return response()->json($vente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vente $vente)
    {
        $validator = Validator::make($request->all(),[
            'poids' => 'required|integer',
            'montant' => 'required|integer',
           /* 'date' => 'required|',*/
            'pisteur_id' => 'required',
            'producteur_id' => 'required',
            'produit_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',

        ]);


        if ($validator->fails())
        {

            return response()->json($validator->messages(), 400);
        }


        $vente->poids = $request->input('poids');
        $vente->montant = $request->input('montant');
        $vente->date = Carbon::now();
        $vente->pisteur_id = $request->input('pisteur_id');
        $vente->producteur_id = $request->input('producteur_id');
        $vente->produit_id = $request->input('produit_id');
        $vente->latitude = $request->input('latitude');
        $vente->longitude = $request->input('longitude');
        $vente->save();

        event(new VenteEvent($vente));

        return response()->json($vente,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ventes()
    {
        $ventes = Vente::orderBy('id', 'desc')->take(5)->get();

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


        }
        return response()->json($mesventes);

    }
}
