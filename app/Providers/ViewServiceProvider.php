<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Subcategory;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot(){
	    View::composer('*', function ($view) {
        $categoriasSidebar = Category::orderBy('id', 'ASC')->get();
        
        $subcategoriasSidebar = Subcategory::orderBy('id', 'ASC')->get();


        $view->with(compact('categoriasSidebar', 'subcategoriasSidebar'));
	    });
    }
}