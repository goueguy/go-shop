<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Article;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $clients = User::where('role_id',4)->count();
        $articles = Article::count();
        $vendeurs = Provider::count();
        $commandes = Order::count();
        return view("admin.dashboard",compact('clients','articles','vendeurs','commandes'));
    }
}
