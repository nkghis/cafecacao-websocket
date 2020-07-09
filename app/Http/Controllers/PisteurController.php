<?php

namespace App\Http\Controllers;

use App\Pisteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PisteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pisteur = Pisteur::all();
        return response()->json($pisteur);
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
    public function store(Request $request, Pisteur $pisteur)
    {
        $validator = Validator::make($request->all(),[
            'login' => 'required|unique:pisteurs',
            'nom' => 'required',
            'prenom' => 'required',
            'motdepasse' => 'required',

        ]);


        if ($validator->fails())
        {

            return response()->json($validator->messages(), 400);
        }

        $pisteur->login = $request->input('login');
        $pisteur->nom = $request->input('nom');
        $pisteur->prenom = $request->input('prenom');
        $pisteur->motdepasse = Hash::make($request->input('motdepasse'));
        $pisteur->save();

        return response()->json($pisteur,200);

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

    /*    public function auth(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('motdepasse');
        $pisteur = Pisteur::where('login', '=', $login)
                            ->where('motdepasse', '=', $password)
                            ->get();

        if(!$pisteur)
        {
            return response()->json('Désolé pisteur non trouvé', 404);
        }
        else
        {
            return response()->json($pisteur,200);
        }

    }*/

    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'login' => 'required',
            'motdepasse' => 'required'

        ]);


        if ($validator->fails())
        {

            return response()->json($validator->messages(), 400);
        }



        $login = $request->input('login');
        $password = $request->input('motdepasse');

        $pisteur = Pisteur::where('login', '=', $login)->first();



        if(!$pisteur)
        {
            return response()->json('Désolé pisteur non trouvé', 404);
        }

        else
        {
            $hashed_password = $pisteur->motdepasse;
            $auth = Hash::check($password, $hashed_password);
            if (!$auth)
            {
                return response()->json('Désolé pisteur non trouvé', 404);
            }
            else{
                return response()->json($pisteur,200);
            }
        }

    }
}
