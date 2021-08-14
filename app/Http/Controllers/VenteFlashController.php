<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenteFlashController extends Controller
{
    public function index(){
        return view('frontend.ventes.ventes-flash');
    }
}
