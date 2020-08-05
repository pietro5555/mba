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


