<?php

namespace App\Providers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('menu_items')){

            $menuItems = MenuItem::where('status','Activé')->get();

            view()->share('menuItems',$menuItems);
        }

    }
}
