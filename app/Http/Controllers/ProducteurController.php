<?php

namespace App\Http\Controllers;

use App\Producteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProducteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producteur = Producteur::all();
        return response()->json($producteur);
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
    public function store(Request $request, Producteur $producteur)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'reference' => 'required|unique:producteurs',
            'prenom' => 'required',
            'datenaiss' => 'required',
            'localite' => 'required',
            'cooperative_id' => 'required'

        ]);


        if ($validator->fails())
        {

            return response()->json($validator->messages(), 400);
        }


        $producteur->nom = $request->input('nom');
        $producteur->reference = $request->input('reference');
        $producteur->prenom = $request->input('prenom');
        $producteur->datenaiss = $request->input('datenaiss');
        $producteur->localite = $request->input('localite');
        $producteur->cooperative_id = $request->input('cooperative_id');
        $producteur->save();
        return response()->json($producteur, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producteur = Producteur::where('reference', '=', $id)->first();

        if(!$producteur)
        {
            return response()->json('Désolé producteur non trouvé', 404);
        }
        else
        {
            return response()->json($producteur);
        }
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
}
