<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public  function index ($id)
    {
        return view('maps.index');
    }
}
