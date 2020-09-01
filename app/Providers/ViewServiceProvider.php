<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot(){
	    View::composer('*', function ($view) {
        $categoriasSidebar = \App\Models\Category::orderBy('id', 'ASC')->get();
        
        $subcategoriasSidebar = \App\Models\Subcategory::orderBy('id', 'ASC')->get();


        $view->with(compact('categoriasSidebar', 'subcategoriasSidebar'));
	    });
    }
}