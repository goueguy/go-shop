<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
   public function index(){
       return view('frontend.boutique.index');
   }
}
