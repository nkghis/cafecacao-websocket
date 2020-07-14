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
        $result = Vente::orderBy('id', 'desc')->take(5)->get();

        return view('dashboard', compact('result'));


        //return view('dashboard');
    }
}
