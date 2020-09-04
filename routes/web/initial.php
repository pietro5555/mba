<?php

/*
|--------------------------------------------------------------------------
| WEB RUTAS.
|--------------------------------------------------------------------------
|
| Esta es la ruta inicial del sistema.
| puedes agregar o modificar dicha ruta y seleccionar en las configuraciones
| una nueva ruta principal.
|
*/
Route::get('/', 'HomeController@index')->name('index');

Route::get('search/{busqueda}', 'HomeController@search')->name('search');
Route::get('search-by-category/{category_slug}/{category_id}/{subcategory_slug}/{subcategory_id}', 'HomeController@search_by_category')->name('search-by-category');


