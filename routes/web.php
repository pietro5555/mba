<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('certificado', 'HomeController@certificado');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/certificado', "HomeController@certificado");

Route::get('search', 'HomeController@search')->name('search');
Route::get('search-by-category/{category_slug}/{category_id}/{subcategory_slug}/{subcategory_id}', 'HomeController@search_by_category')->name('search-by-category');

Auth::routes();

// configuracion inicial
Route::group(['prefix' => 'installer'], function (){
    Route::get('/step1', 'InstallController@index')->name('install-step1');
    Route::post('/savestep1', 'InstallController@saveStep1')->name('install-save-step1');
    Route::get('/step2', 'InstallController@step2')->name('install-step2');
    Route::post('/savestep2', 'InstallController@saveStep2')->name('install-save-step2');
    Route::get('/end', 'InstallController@end')->name('install-end');
    // Registro de las licencias
    Route::post('/savelicencia', 'HomeController@saveLicencia')->name('autenticacion-save-licencia');
    
    //encriptar licencia y fechas
    Route::get('/licencia', 'InstallController@licencia')->name('install-licencia');
    Route::post('/encript', 'InstallController@encript')->name('install-encript');
    
    
  });
  
  
  Route::get('/clear-cache', function() {
      $exitCode = Artisan::call('config:clear');
      $exitCode = Artisan::call('cache:clear');
      $exitCode = Artisan::call('config:cache');
      return 'DONE'; //Return anything
  });
  
  //nuevo inicio a traves de un nuevo login
  Route::group(['prefix' => 'inicio','middleware' => ['auth']], function(){
      
          Route::get('/inicio', 'Login\InicioController@inicio')->name('inicio-inicio');
          
          //tranferencias
          Route::get('/historial', 'Login\TransferenciasController@historial')->name('transferencia-historial');
          
          Route::post('/transferencia', 'Login\TransferenciasController@transferencia')->name('transferencia-transferencia');
          
          //noticias
           Route::get('/noticias', 'Login\NoticiasController@noticias')->name('noticias-noticias');
          
          Route::post('/savenoticias', 'Login\NoticiasController@save')->name('noticias-save');
          
          Route::get('/delete/{id}', 'Login\NoticiasController@delete')->name('noticias-delete');
          
          //comisiones para transferencias
           Route::get('/feet', 'Login\ConfiguracionController@feet')->name('ajustes-feet');
          Route::post('/comision', 'Login\ConfiguracionController@comision')->name('ajustes-comision');
          
          //limitar acceso
           Route::get('/limitar', 'Login\ConfiguracionController@limitar')->name('restriccion-limitar');
          
          Route::get('/acceso/{id}', 'Login\ConfiguracionController@acceso')->name('restriccion-acceso');
          
          Route::get('/limitartodos', 'Login\ConfiguracionController@limitartodos')->name('restriccion-limitartodos');
          
          
          //recagar billetera
          Route::get('/recarga', 'Login\ConfiguracionController@recarga')->name('ajustes-recarga');
          Route::post('/saverecarga', 'Login\ConfiguracionController@saverecarga')->name('ajustes-save-recarga');
          Route::post('/savetodos', 'Login\ConfiguracionController@save_recarga_todos')->name('ajustes-save-todos-recarga');
          
          //cambio de valor de la moneda
           Route::get('/wallet', 'Login\ConfiguracionController@wallet')->name('ajustes-wallet');
          
          Route::post('/cambio', 'Login\ConfiguracionController@cambio')->name('ajustes-cambio');
          
  
      });
  
  Route::group(['prefix' => 'aut', 'middleware' => ['licencia', 'menu']], function (){
    Route::get('/register', 'Auth\RegisterController@newRegister')->name('autenticacion.new-register');
    Route::post('/saveregister', 'Auth\RegisterController@creater')->name('autenticacion.save-register');
     // pare enviar el correo
    Route::post('/recuperarclave', 'RecuperarController@Correo')->name('autenticacion.clave');
    // para recibir el codigo enviado y ir a la pagina de cambiar correo
    Route::get('/getcodigo/{id}', 'RecuperarController@getCodigo')->name('autenticacion-codigo');
    // para guardar el nuevo correo
    Route::post('/guardarclave', 'RecuperarController@change')->name('autenticacion-new-clave');
  
    Route::post('/loginnew', 'RecuperarController@nuevoLogin')->name('autenticacion-login');
    
    //nueva login para transferencias y accesos
     Route::get('/log', 'Login\LoginController@nuevologin')->name('login-nuevologin');
          
     Route::post('/envio', 'Login\LoginController@envio')->name('login-envio');
          
     Route::get('/cerrar', 'Login\LoginController@cerrar')->name('login-cerrar');
     
     //Login Sinergia
     //envio de codigo por correo
     Route::get('/login/', 'Auth\LoginController@codigo')->name('login.codigo');
     Route::post('/verificarcodigo', 'Auth\LoginController@verificarCodigo')->name('login.veri-cod');
     
     //codigo qr con google
     Route::post('/2factor', 'Auth\LoginController@factor2')->name('login.veri-2factor');
    
  });
  
  // Tienda Online
  Route::group(['prefix' => 'tienda', 'middleware' => ['auth', 'licencia', 'menu']], function (){
      Route::get('/', 'TiendaController@index')->name('tienda-index');
      Route::post('savecompra', 'TiendaController@saveOrdenPosts')->name('tienda-save-compra');
      Route::get('/solicitudes', 'TiendaController@solicitudes')->name('tienda-solicitudes');
      Route::get('/accionsolicitud/{id}/{estado}/accion', 'TiendaController@accionSolicitud')->name('tienda-accion-solicitud');
      Route::post('filtro', 'TiendaController@filtro')->name('tienda-filtro');
       
       //agregar productos
      Route::get('/product', 'Tienda\TiendasController@product')->name('tienda-accion-product');
      Route::post('/saveproduct', 'Tienda\TiendasController@saveproduct')->name('tienda-product-save');
      Route::get('/nuevalista', 'Tienda\TiendasController@nuevalista')->name('tienda-product-nueva');
      Route::get('/editarproducto/{id}', 'Tienda\TiendasController@edit')->name('tienda-product-edit');
      Route::post('/saveeditar', 'Tienda\TiendasController@saveeditar')->name('tienda-product-saveeditar');
      Route::get('/eliminarproducto/{id}', 'Tienda\TiendasController@eliminar')->name('tienda-product-eliminar');
      
          //crear categrias
          Route::get('/listacat', 'Tienda\TiendasController@listacat')->name('tienda-listacat');
          Route::get('/eliminarcat/{id}', 'Tienda\TiendasController@eliminarcat')->name('tienda-eliminarcat');
          Route::post('/actualizarcat', 'Tienda\TiendasController@actualizarcat')->name('tienda-actualizarcat');
          
          Route::post('/savecate', 'Tienda\TiendasController@savecate')->name('tienda-savecate');
          
          //informacion bancaria
          Route::get('/bancaria','TiendaController@bancaria')->name('bancaria-bancaria');
          Route::post('/bancariaguardar','TiendaController@guardar')->name('bancaria-guardar');
          Route::get('/bancariadescargar','TiendaController@descargar')->name('bancaria-descargar');
          
          //link de pagos
          Route::get('/pago','TiendaController@pago')->name('link-pago');
          Route::get('/listado','TiendaController@listado')->name('link-listado');
          Route::post('/subir','TiendaController@subir')->name('link-subir');
          Route::get('/cerrar/{id}','TiendaController@cerrar')->name('link-cerrar');
          
  });
  
  
  /*Rutas MBA*/
  
  //vista del login (/login)
  Route::get('/log', 'LoginController@login')->name('log');
  Route::post('/autenticar', 'LoginController@autenticacion')->name('autenticar');
  
  /* Rutas de la Landing */
  Route::get('load-more-courses-new/{ultimoId}/{accion}', 'CourseController@load_more_courses_new')->name('landing.load-more-courses-new');
  Route::get('book-event/{evento}', 'EventsController@book')->name('landing.book-event');
  // Cursos por categoria
  Route::get('courses/category/{id}', 'CursosController@show_course_category')->name('show.cursos.category');
  //Perfil del mentor
  Route::get('courses/mentor/{id}', 'CursosController@perfil_mentor')->name('show.perfil.mentor');
  Route::get('courses/mentor', 'CursosController@show_course_category')->name('show.cursos.category');
  
  /*** RUTAS PARA EL CARRITO DE COMPRA***/
  Route::group(['prefix' => 'shopping-cart'], function(){
    Route::get('/', 'ShoppingCartController@index')->name('shopping-cart.index');
    Route::get('store/{id}', 'ShoppingCartController@store')->name('shopping-cart.store');
    Route::get('delete/{id}', 'ShoppingCartController@delete')->name('shopping-cart.delete');
    Route::post('finish', 'CoursesOrdenController@procesarCompra')->name('shopping-cart.finish');
  });
  
  //Rutas de timelive
  Route::group(['prefix' => 'time'], function(){
    Route::get('/timelive', 'EventsController@timelive')->name('timelive');
    Route::get('/oauth/{id}', 'CalendarioGoogleController@oauth')->name('oauthCallback');
    Route::get('/redirigircalendario', 'CalendarioGoogleController@index')->name('cal.index');
    Route::get('/proximo/{id}', 'CalendarioGoogleController@proximo')->name('time-prox');
  });
    
  //Cursos
  Route::get('cursos', 'CursosController@index')->name('cursos');
  //Route::get('cursos/curso', 'CursosController@show_one_course')->name('curso');
  
  Route::group(['prefix' => 'courses'], function(){
    Route::get('/', 'CourseController@index')->name('courses');
    Route::get('show/{slug}/{id}', 'CourseController@show')->name('courses.show');
     Route::get('lesson/{slug}/{id}/{course_id}', 'CourseController@lesson')->name('lesson.show');
    //Route::get('recommended', 'CourseController@recommended')->name('courses.recommended');
  });
  
  /*** RUTAS PARA LOS CLIENTES ***/
  Route::group(['prefix' => 'client', 'middleware' => ['auth']], function(){
     Route::group(['prefix' => 'courses'], function(){
        Route::get('my-list', 'CourseController@my_courses')->name('client.my-courses');
        Route::get('add/{curso}', 'CourseController@add')->name('client.courses.add');
        Route::post('rate', 'RatingController@store')->name('client.courses.rate');
        Route::get('{slug}/{id}/take-evaluation', 'EvaluationController@take')->name('client.courses.take-evaluation');
        Route::post('submit-evaluation', 'EvaluationController@submit')->name('client.courses.submit-evaluation');
        Route::get('get-certificate/{curso}', 'EvaluationController@get_certificate')->name('client.courses.get-certificate');
     });
     Route::get('favorites/', 'CourseController@favorites')->name('favorites');
     Route::get('favorite/{id}', 'CourseController@course_favorite')->name('courses.favorite');

  });
  
  
  
  //vista de transmisiones
  Route::get('/transmisiones', 'TransmisionesController@transmisiones')->name('transmisiones');
  Route::get('/agendar/{id}', 'TransmisionesController@agendar')->name('transmi-agendar');
  
  //Streaming
  Route::get('streaming', 'StreamingController@index')->name('streaming.index');
  Route::get('getaccesstoken', 'StreamingController@getAccessToken')->name('streaming.getaccesstoken');
  Route::get('new-channel', 'StreamingController@new_channel')->name('streaming.new-channel');
  Route::get('encode', function(){
    dd(base64_encode('ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019:b115060c57dd13dfce8f0adc25643ca470f8861c'));
  });
  
  
  
  //Agendar
  Route::get('schedule/{event_id}', 'EventsController@schedule')->name('schedule.event');
  Route::get('calendar', 'EventsController@calendar')->name('schedule.calendar');
  //vista de anotaciones
  Route::get('/anotaciones', 'NoteController@index')->name('anotaciones');
  Route::post('/anotaciones/store', 'NoteController@store')->name('live.anotaciones');
  
  //vista de timelive
      Route::group(['prefix' => 'time'], function(){
      Route::get('/timelive', 'EventsController@timelive')->name('timelive');
      Route::get('/oauth/{id}', 'CalendarioGoogleController@oauth')->name('oauthCallback');
      Route::get('/redirigircalendario', 'CalendarioGoogleController@index')->name('cal.index');
      Route::get('/proximo/{id}', 'CalendarioGoogleController@proximo')->name('time-prox');
      Route::get('/favorite/{id}', 'EventsController@event_favorite')->name('event.favorite');
       });
  
  // Events landing
  Route::get('/event/{event_id}', 'EventsController@show_event')->name('show.event');
  
  //Configurar eventos
  Route::post('/settings/event/{event_id}', 'SetEventController@store')->name('set.event.store');
  
  
  Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'licencia', 'menu']], function() {
  
    Route::group(['prefix' => 'red'], function(){
          Route::get('/listado', 'RedController@index')->name('admin-red-index');
          Route::post('/filtrered', 'RedController@filtrered')->name('admin-red-filtre');

          // vista de referidos directos e indirectos
      Route::get('/direct', 'RedController@direct')->name('red.directos');
      //filtros de referidos directos e indirectos
      Route::post('/filtrere', 'RedController@filtre')->name('red.filtre');
      //volumen grupal
      Route::get('/individual', 'RedController@individual')->name('individual');
      Route::post('/todofecha', 'RedController@todofecha')->name('todofecha');
      Route::post('/filtrouser', 'RedController@filtrouser')->name('filtrouser');
        });
  
    Route::group(['prefix' => 'usuarios'], function(){
          Route::get('/administrador', 'UsuarioController@admin')->name('admin-users-administrador');
          Route::get('/permiso/{id}', 'PermisosController@permiso')->name('admin-users-permisos');
          Route::post('/savepermiso', 'PermisosController@savepermiso')->name('admin-save-permiso');
        });
  
    Route::group(['prefix' => 'entradas'], function(){
          Route::get('/entrada', 'EntradasController@index')->name('admin-users-entrada');
          Route::get('/deletentrada/{id}', 'EntradasController@deletentrada')->name('admin-delet-entrada');
           Route::get('/actuentrada/{id}', 'EntradasController@actualentrada')->name('admin-actual-entrada');
          Route::post('/editentrada', 'EntradasController@editentrada')->name('admin-edit-entrada');
          Route::post('/saventrada', 'EntradasController@saveentrada')->name('admin-save-entrada');
        }); 
    
     Route::group(['prefix' => 'courses'], function(){
        Route::get('/', 'CourseController@record')->name('admin.courses.index');
        Route::post('store', 'CourseController@store')->name('admin.courses.store');
        Route::get('edit/{id}', 'CourseController@edit')->name('admin.courses.edit');
        Route::post('update', 'CourseController@update')->name('admin.courses.update');
        Route::get('change-status/{id}/{status}', 'CourseController@change_status')->name('admin.courses.change-status');
        Route::post('add-featured', 'CourseController@add_featured')->name('admin.courses.add-featured');
        Route::get('quit-featured/{id}', 'CourseController@quit_featured')->name('admin.courses.quit-featured');
  
        Route::group(['prefix' => 'categories'], function(){
           Route::get('', 'CategoryController@index')->name('admin.courses.categories');
           Route::post('add', 'CategoryController@add_category')->name('admin.courses.add-category');
           Route::get('edit/{id}', 'CategoryController@edit_category')->name('admin.courses.edit-category');
           Route::post('update', 'CategoryController@update_category')->name('admin.courses.update-category');
           Route::get('delete/{id}', 'CategoryController@delete_category')->name('admin.courses.delete-category');
        });
  
        Route::group(['prefix' => 'subcategories'], function(){
          Route::get('/', 'CategoryController@subcategories')->name('admin.courses.subcategories');
          Route::post('add', 'CategoryController@add_subcategory')->name('admin.courses.add-subcategory');
           Route::get('edit/{id}', 'CategoryController@edit_subcategory')->name('admin.courses.edit-subcategory');
           Route::post('update', 'CategoryController@update_subcategory')->name('admin.courses.update-subcategory');
           Route::get('delete/{id}', 'CategoryController@delete_subcategory')->name('admin.courses.delete-subcategory');
        });
  
        Route::group(['prefix' => 'tags'], function(){
          Route::get('/', 'TagController@index')->name('admin.courses.tags');
          Route::post('store', 'TagController@store')->name('admin.courses.add-tag');
          Route::get('edit/{id}', 'TagController@edit')->name('admin.courses.edit-tag');
          Route::post('update', 'TagController@update')->name('admin.courses.update-tag');
          Route::get('delete/{id}', 'TagController@delete')->name('admin.courses.delete-tag');
        });
  
        Route::group(['prefix' => 'lessons'], function(){
          Route::get('/{id}', 'LessonController@index')->name('admin.courses.lessons');
          Route::post('store', 'LessonController@store')->name('admin.courses.lessons.store');
          Route::get('edit/{id}', 'LessonController@edit')->name('admin.courses.lessons.edit');
          Route::post('update', 'LessonController@update')->name('admin.courses.lessons.update');
          Route::get('delete/{id}', 'LessonController@delete')->name('admin.courses.lessons.delete');
  
          Route::group(['prefix' => 'resources'], function(){
            Route::get('/{id}', 'ResourcesController@index')->name('admin.courses.lessons.resources');
            Route::post('store', 'ResourcesController@store')->name('admin.courses.lessons.resources.store');
            Route::get('edit/{id}', 'ResourcesController@edit')->name('admin.courses.lessons.resources.edit');
            Route::post('update', 'ResourcesController@update')->name('admin.courses.lessons.resources.update');
            Route::get('delete/{id}', 'ResourcesController@delete')->name('admin.courses.lessons.resources.delete');
          });
        });
  
        Route::group(['prefix' => 'evaluation'], function(){
          Route::post('store', 'EvaluationController@store')->name('admin.courses.evaluation.store');
          Route::post('update', 'EvaluationController@update')->name('admin.courses.evaluation.update');
          Route::get('show/{id}', 'EvaluationController@show')->name('admin.courses.evaluation.show');
          Route::post('add-question', 'EvaluationController@add_question')->name('admin.courses.evaluation.add-question');
          Route::get('edit-question/{id}', 'EvaluationController@edit_question')->name('admin.courses.evaluation.edit-question');
          Route::post('update-question', 'EvaluationController@update_question')->name('admin.courses.evaluation.update-question');
          Route::get('delete-question/{id}', 'EvaluationController@delete_question')->name('admin.courses.evaluation.delete-question');
        });
     });
  
     //Eventos admin
     Route::group(['prefix' => 'events'], function(){
       Route::get('prueba', 'EventsController@prueba');
      Route::get('/', 'EventsController@index')->name('admin.events.index');
      Route::get('show/{id}', 'EventsController@show')->name('admin.events.show');
      Route::post('store', 'EventsController@store')->name('admin.events.store');
      Route::get('edit/{id}', 'EventsController@edit')->name('admin.events.edit');
      Route::post('update', 'EventsController@update')->name('admin.events.update');
      Route::delete('delete/{id}', 'EventsController@delete')->name('admin.events.delete');
      Route::get('change-status/{id}/{status}', 'EventsController@change_status')->name('admin.events.change-status');
  
    });
  
    //Streaming
    Route::get('streaming', 'StreamingController@index')->name('streaming.index');
    Route::get('getaccesstoken', 'StreamingController@getAccessToken')->name('streaming.getaccesstoken');
  
      
  
      // Actualiza todos la informacion para los usuarios
      Route::get('updateall', 'AdminController@ActualizarTodo')->name('admin-update-all');
  
      // Rutas usuarios
      Route::group(['prefix' => 'users'], function(){
        // todos lo usuarios
        Route::get('/records', 'UsuarioController@index')->name('users.records');
        // editar 
        Route::get('/edit/{id}', 'ActualizarController@user_edit')->name('users.edit');
        
        //editar la contrase単a de todos
        Route::post('/editpassword', 'HomeController@password_todos')->name('users.password');
        // borrar
        Route::get('/delete/{id}', 'HomeController@deleteProfile')->name('users.delete');
        // borrar todo
        Route::post('/deletetodos/{id}', 'AdminController@deleteTodos')->name('users.deletetodos');
        // listado de usuarios directos
        Route::get('/directrecords', 'UsuarioController@direct_records')->name('directrecords');
        Route::post('/buscardirectos','UsuarioController@buscardirectos')->name('buscardirectos');
        // listado de los usuarios de mi red
        Route::get('/networkrecords', 'UsuarioController@network_records')->name('networkrecords');
        Route::post('/buscarnetwork','UsuarioController@buscarnetwork')->name('buscarnetwork');
        // descargar toda la red
        Route::get('/downloadred', 'UsuarioController@exportUsers')->name('downloadred');
      });
      
      // Billetera
      Route::group(['prefix' => 'wallet'], function(){
          Route::get('/', 'WalletController@index')->name('wallet-index');
          Route::post('/fil', 'WalletController@filtro')->name('wallet-filtro');
          Route::post('/filuser', 'WalletController@filtrouser')->name('wallet-filtro-user');
          Route::post('/filref', 'WalletController@filtrorefe')->name('wallet-filtro-normal');
          
          Route::post('/transferencia', 'WalletController@transferencia')->name('wallet-transferencia');
          Route::get('/obtenermetodo/{id}', 'WalletController@datosMetodo')->name('wallet-metodo');
          Route::post('/retiro', 'WalletController@retiro')->name('wallet-retiro');
          Route::get('{id}/cancelar', 'WalletController@cancelarComision')->name('wallet-cancel');
          
          Route::get('/historial', 'WalletController@historial')->name('wallet-historial');
          Route::post('/historialfechas', 'WalletController@historial_fechas')->name('wallet-historial-fechas');
          
          Route::get('/cobros', 'WalletController@cobros')->name('wallet-cobros');
          Route::post('/cobrosfechas', 'WalletController@cobros_fechas')->name('wallet-cobros-fechas');
          
          //recarga de billetera
          Route::get('/recarga','WalletController@recarga')->name('wallet.recarga');
          Route::post('/amount','WalletController@amount')->name('wallet.amount');
          
          //canje de puntos
          Route::get('/canje','WalletController@canje')->name('cambio-canje');
          Route::post('/cambios','WalletController@guardar')->name('cambio-guardar');
          Route::get('/lista','WalletController@lista')->name('cambio-lista');
          Route::get('/aceptar/{id}','WalletController@aceptar')->name('cambio-aceptar');
          Route::get('/cancelar/{id}','WalletController@cancelar')->name('cambio-cancelar');
          Route::post('/valores','WalletController@valores')->name('cambio-valores');
          
          //todos los retiros, corte y liquidaciones
          Route::get('/cortes','WalletController@cortes')->name('wallet-cortes');
          
          //tabla de comisiones a pagar
          Route::get('/comisionesapagar','WalletController@comisionespagar')->name('wallet-comisiones-pagar');
          Route::post('/comisionesfiltro','WalletController@comisionesfiltro')->name('wallet-comisiones-pagar-filtro');
      });
      
      // Pago
      Route::group(['prefix' => 'price'], function(){
          Route::get('/historial', 'PagoController@historyPrice')->name('price-historial');
          Route::get('/confirmar', 'PagoController@confimPrice')->name('price-confirmar');
          Route::get('/aceptarpago/{id}', 'PagoController@aprobarPago')->name('price-aprobar');
          Route::get('/rechazarpago/{id}', 'PagoController@rechazarPago')->name('price-rechazar');
          Route::post('/filtro', 'PagoController@filtro')->name('price-filtro');
          Route::get('/aceptartodo', 'PagoController@pagarTodo')->name('price-aprobar-all');
          Route::post('/aceptarmassivo', 'PagoController@pagoMasivo')->name('price-massive');
          
          //liquidacion 
          Route::post('/liquidacion', 'PagoController@liquidaciones')->name('price-liquida-todo');
          
          Route::get('/montos', 'PagoController@montos')->name('price-montos');
      });
  
      // graficas
      Route::group(['prefix' => 'chart'], function(){
          Route::get('ventas', 'IndexController@chartVentas')->name('chart.ventas');
          Route::get('usuarios', 'IndexController@chartUsuarios')->name('chart.usuarios');
      });
  
      // Configuraciones
      Route::group(['prefix' => 'settings'], function ()
      {
          // seccion logo, favico y nombre sistema
          Route::get('/sistema', 'SettingController@indexLogo')->name('setting-logo');
          Route::post('/savelogo', 'SettingController@saveLogo')->name('setting-save-logo');
          Route::post('/savefavicon', 'SettingController@saveFavicon')->name('setting-save-favicon');
          
           Route::post('/savebanner', 'SettingController@saveBanner')->name('setting-save-banner');
           
           Route::post('/savebannerinicio', 'SettingController@saveBannerinicio')->name('setting-save-bannerinicio');
           
           Route::post('/savebannerformulario', 'SettingController@saveBannerFormulario')->name('setting-save-banner-formulario');
           
          Route::post('/savename', 'SettingController@updateName')->name('setting-save-name');
          // seccion campos formularios
          Route::get('/formulario', 'Settings\FormularioController@indexFormulario')->name('setting-formulario');
          Route::post('saveform', 'Settings\FormularioController@saveForm')->name('setting-save-form');
          Route::get('/updatefield/{id}/{estado}', 'Settings\FormularioController@statusField')->name('setting-update-field');
          Route::get('/getform/{id}', 'Settings\FormularioController@getForm')->name('setting-get-form');
          Route::post('/updateform', 'Settings\FormularioController@updateForm')->name('setting-update-form'); 
          Route::get('/deleteform/{id}', 'Settings\FormularioController@deleteForm')->name('setting-delete-form');
          Route::post('/terminos', 'Settings\FormularioController@terminos')->name('setting-terminos');
          Route::get('/posicionamiento', 'Settings\FormularioController@posicionamiento')->name('setting-posicionamiento');
          // seccion de comisiones
          Route::get('/comisiones', 'Settings\ComisionesController@indexComisiones')->name('setting-comisiones');
          Route::post('/savecomision', 'Settings\ComisionesController@saveSettingComision')->name('setting-save-comision');
          Route::post('/savebono', 'Settings\ComisionesController@saveBono')->name('setting-save-bono');
          Route::post('/saveprimeracompra', 'Settings\ComisionesController@savePrimera_compra')->name('setting-save-primara-compra');
          Route::post('/savegetcomision', 'Settings\ComisionesController@saveRecibirComision')->name('setting-save-get-comision');
          Route::post('/saveproducto', 'Settings\ComisionesController@saveProducto')->name('setting-save-producto');
          Route::post('/deleteproducto', 'Settings\ComisionesController@deleteProducto')->name('setting-delete-producto');
          Route::get('/getrangosall', 'Settings\ComisionesController@allRangos')->name('settings-get-all-rangos');
          Route::get('/getproductosall', 'Settings\ComisionesController@allProductos')->name('settings-get-all-productos');
          // seccion de estructura (Arbol - Matrix)
          Route::get('/estructura', 'Settings\EstructuraController@indexEstructura')->name('setting-estructura');
          Route::post('/saveestrutura', 'Settings\EstructuraController@saveEstructura')->name('setting-save-estructura');
          // seccion de Rango
          Route::get('/rangos', 'Settings\RangoController@indexRango')->name('setting-rango');
          Route::post('/saverango', 'Settings\RangoController@saveRangos')->name('setting-save-rango');
          // seccion de pago
          Route::get('/pagos', 'Settings\PagoController@indexPago')->name('setting-pago');
          Route::post('/savepagos', 'Settings\PagoController@savePagos')->name('setting-save-pagos');
          Route::get('/updatepago/{id}/{estado}', 'Settings\PagoController@statusPago')->name('setting-update-pagos');
          Route::post('/savecomisionpago', 'Settings\PagoController@comisionMetodoPago')->name('setting-comision-pago');
          Route::get('/getmetodo/{id}', 'Settings\PagoController@getMetodo')->name('setting-get-metodo');
          Route::post('/updatemetodo', 'Settings\PagoController@updateMetodo')->name('setting-update-metodo'); 
          Route::get('/deletemetodo/{id}', 'Settings\PagoController@deleteMetodo')->name('setting-delete-metodo');
          Route::post('/activarbotones', 'Settings\PagoController@opcionBotones')->name('setting-botones');
          // seccion de plantilla de correo
          Route::get('/plantilla', 'SettingController@indexPlantilla')->name('setting-plantilla');
          Route::post('/saveplantilla', 'SettingController@savePlantilla')->name('setting-save-plantilla');
          Route::post('/probaplantilla', 'SettingController@probarPlantilla')->name('setting-probar-plantilla');
          
          Route::post('/servidor', 'SettingController@servidor')->name('setting-servidor');
          
          Route::post('/activarCorreo', 'SettingController@activarCorreo')->name('setting-activar-activarCorreo');
          // seccion permisos
          Route::get('/permisos', 'SettingController@indexPermisos')->name('setting-permisos');
          Route::post('/adminsave', 'SettingController@saveAdmin')->name('setting-save-admin');
          Route::get('/getpermisos/{id}', 'SettingController@getPermisos')->name('setting-get-permisos');
          Route::post('/savepermiso', 'SettingController@savePermisos')->name('setting-save-permisos');
          // seccion activacion
          Route::get('/activacion', 'SettingController@indexActivacion')->name('setting-activacion');
          Route::post('/saveactivacion', 'Settings\ActivacionController@saveActivacion')->name('setting-save-activacion');
          // seccion de monedas
          Route::get('/monedas', 'SettingController@indexMonedas')->name('setting-monedas');
          Route::post('/savemonedas', 'SettingController@saveMonedas')->name('setting-save-monedas');
          Route::get('/updatemoneda/{id}/{estado}', 'SettingController@statusMoneda')->name('setting-update-moneda-principal');
          Route::get('/deletemoneda/{id}', 'SettingController@deleteMoneda')->name('setting-delete-moneda');
          //Monedas adicionales
          Route::post('/savemonedasadicional', 'MonedaAdicionalController@savemonedasadicional')->name('setting-save-monedas-adicional');
          Route::post('/updatemonedadicional', 'MonedaAdicionalController@modificarmoneda')->name('setting-update-moneda-adicional');
          Route::post('/deletemonedadicional', 'MonedaAdicionalController@deleteMonedadicional')->name('setting-delete-moneda-adicional');
          
          //configurar los puntos
          Route::get('/puntos', 'Settings\PuntosController@puntos')->name('setting-puntos');
          Route::post('/savepuntos', 'Settings\PuntosController@saveSettingPuntos')->name('setting-save-puntos');
          
          Route::post('/edit', 'Settings\PuntosController@edit')->name('setting-edit-puntos');
          Route::post('/crear', 'Settings\PuntosController@crear')->name('setting-crear-puntos');
          Route::post('/eliminar', 'Settings\PuntosController@eliminar')->name('setting-eliminar-puntos');
          
          //configurar informe de ganancias
          Route::get('/ganancias', 'Settings\GananciaController@ganancias')->name('setting-ganancias');
          Route::post('/saveganancias', 'Settings\GananciaController@saveganancias')->name('setting-save-ganancias');
          
           Route::post('/nota', 'Settings\GananciaController@nota')->name('setting-save-nota');
          
          //imagenes del arbol
          Route::get('/imagenes', 'SettingController@imagenes')->name('setting-imagenes');
          Route::post('/agregaravatar', 'SettingController@agregaravatar')->name('setting-agregar-avatar');
          Route::post('/Cambiaravatar', 'SettingController@cambairavatar')->name('setting-cambiar-avatar');
          
          
          //Modulo complementario
          Route::get('/moduloComplementario', 'SettingController@modulo')->name('setting-modulo');
          Route::post('/agregarmodulo', 'SettingController@guardarModulo')->name('setting-agregar-modulo');
          Route::get('/complementario', 'SettingController@complemento')->name('setting-complemento');
          
          //apartado del sistema
          Route::get('/traductor', 'SettingController@traductor')->name('setting-traductor');
          Route::get('/recarga', 'SettingController@recarga')->name('setting-recarga');
          Route::get('/canje', 'SettingController@canje')->name('setting-canje');
          Route::get('/btc', 'SettingController@btc')->name('setting-btc');
        
           Route::get('/vista', 'Settings\IvaController@vista')->name('setting-iva');
           Route::post('/saveiva', 'Settings\IvaController@saveIva')->name('setting-saveiva');
           Route::get('/getcategorias', 'Settings\IvaController@allCategorias')->name('settings-get-categorias');
           
          Route::post('/editiva', 'Settings\IvaController@editiva')->name('setting-edit-iva');
          Route::post('/creariva', 'Settings\IvaController@creariva')->name('setting-crear-iva');
          Route::post('/eliminariva', 'Settings\IvaController@eliminariva')->name('setting-eliminar-iva');
          
          //Redes Sociales
          Route::get('/redes', 'Settings\RedessocialesController@red')->name('setting-red');
          Route::post('/savered', 'Settings\RedessocialesController@savered')->name('setting-save-red');
          Route::get('/eliminar/{id}', 'Settings\RedessocialesController@eliminar')->name('setting-eliminar-red');
          Route::post('/editarred', 'Settings\RedessocialesController@editar')->name('setting-editar-red');
          
          //pop up
           Route::get('/pop', 'SettingController@pop')->name('setting-pop');
           Route::post('/up', 'SettingController@up')->name('setting-up');
           Route::get('/activacionpop', 'SettingController@desactivacion')->name('setting-desactivaciom-pop');
           
           //seguridad
           Route::get('/seguridad', 'Settings\SeguridadController@envioseguridad')->name('setting-seguridad');
           Route::post('/save', 'Settings\SeguridadController@saveseguridad')->name('setting-save-seguriti');
           Route::get('/active/{id}', 'Settings\SeguridadController@active')->name('setting-seguridad-active');
           Route::get('/desactivado/{id}', 'Settings\SeguridadController@desactivado')->name('setting-seguridad-desactivado');
           Route::post('/editar', 'Settings\SeguridadController@editar')->name('setting-seguridad-editar');
           
           //drop
           Route::post('/savehome', 'ComponentController@savehome')->name('setting-save-home');
           Route::get('/deletedop/{id}', 'ComponentController@deleteDrop')->name('setting-delete-drop');
           
           //modo oscuro
           Route::get('/modo_oscuro/{id}', 'SettingController@modo_oscuro')->name('setting-modo-oscuro');
           
           
           //administrador de gastos
           Route::get('/administrador', 'AdministradorGastosController@administrador')->name('setting-admi-nistrador');
           Route::post('/crearadmin', 'AdministradorGastosController@crearlista')->name('setting-save-administrador');
           
           Route::post('/creargasto', 'AdministradorGastosController@creargasto')->name('setting-save-gasto');
           
           Route::post('/editaradministrador', 'AdministradorGastosController@editarAdmin')->name('setting-admi-editar');
           Route::post('/eliminargasto', 'AdministradorGastosController@eliminargasto')->name('setting-eliminar-gasto');
           
           Route::get('/consulta/{inicio}/{fin}/{tipo}', 'AdministradorGastosController@consulta')->name('setting-consulta-administrador');
           
           Route::get('/consulta/{inicio}/{fin}', 'AdministradorGastosController@consulta_top')->name('setting-consulta-top');
           
           //colores del sistema 
           Route::get('/colores/{tipo}', 'SettingController@colores')->name('setting-color-admin');
           
           //configurar la api y demas opciones para btc
           Route::get('/btcconfi', 'SettingController@btcconfi')->name('setting-btcconfi');
           Route::post('/savebtc', 'SettingController@savebtc')->name('setting-save-btc');
           
           
           //configurar de paypal url y boton
           Route::post('/paypalboton', 'SettingController@paypalboton')->name('setting-paypal-boton');
           Route::post('/scriptpaypal', 'SettingController@scriptpaypal')->name('setting-paypal-script');
           Route::get('/paypalutil', 'SettingController@paypalutil')->name('setting-paypal-util');
           
           //complmentario
           Route::get('/complemento', 'SettingController@comple')->name('setting-comple');
           Route::post('/complelog', 'SettingController@complelogin')->name('setting-comple-login');
           Route::post('/compleregistro', 'SettingController@compleregistro')->name('setting-comple-registro');
           
           
           //menu
           Route::get('/menu', 'Settings\MenuController@menu')->name('setting-menu');
           Route::post('/menucambio', 'Settings\MenuController@menucambio')->name('setting-menu-cambio');
           
           //costos de envio
           Route::get('/departamentos', 'Settings\CostoController@departamento')->name('setting-depart');
           Route::post('/savedepart', 'Settings\CostoController@savecosto')->name('setting-save-costo');
           Route::post('/savecapital', 'Settings\CostoController@savecapital')->name('setting-save-capital');
           Route::post('/editcapital', 'Settings\CostoController@editcapital')->name('setting-edit-capital');
           Route::post('/editdepart', 'Settings\CostoController@editdepart')->name('setting-edit-depart');
           Route::get('/eliminarcapital/{id}', 'Settings\CostoController@eliminarcapital')->name('setting-eliminar-capital');
           Route::get('/eliminardepart/{id}', 'Settings\CostoController@eliminardepart')->name('setting-eliminar-depart');
      });
  
  
      //comisiones por fechas
       Route::get('/comisiones_filter', 'ComisionesController@comisiones_filter')->name('admin.comisiones_filter');
       Route::post('/filter_comisiones', 'ComisionesController@filter_comisiones')->name('admin.filter_comisiones');
  
      Route::get('/', 'AdminController@index')->name('admin.index');
      Route::get('/ranking', 'Ranking2Controller@ranking')->name('admin.ranking');
  
      //Transfiere lo que hay en las billeteras al banco
      Route::get('/paycommissions', 'CommissionController@pay_commissions')->name('admin.pay-commissions');
      Route::get('/recordtransfers', 'CommissionController@record_transfers')->name('admin.record-transfers');
  
  
      Route::get('/notifications', 'NotificationController@index')->name('admin.notifications');
      
      //Todo tipo de informes
      Route::group(['prefix' => 'info'], function(){
            //informes de perfil buscar por nombre
            Route::get('/perfil', 'ReporteController@perfil')->name('info.perfil');
            Route::post('/nombre','ReporteController@nombre')->name('info.nombre');
        
        //buscar por ID de usuario
            Route::post('/usuario','ReporteController@usuario')->name('info.usuario');
            Route::get('/mostrar-usuario','ReporteController@mostrarusuario')->name('info.mostrar-usuario');
          
          //desde un ID hasta ID
            Route::post('/lista','ReporteController@lista')->name('info.lista');
            Route::get('/lista-final','ReporteController@listafinal')->name('info.lista-final');
          
          //informes de activos
            Route::get('/activacion','ReporteController@activacion')->name('info.activacion');
            Route::post('/mostrar-activo','ReporteController@mostraractivo')->name('info.mostrar-activo');
            Route::post('/fecha','ReporteController@fecha')->name('info.fecha');
           
           //Rangos
            Route::get('/rango','ReporteController@rango')->name('info.rango');
            Route::post('/mostrar-rango','ReporteController@mostrarrango')->name('info.mostrar-rango');
           
           //comisiones
            Route::get('/comisiones','ReporteController@comisiones')->name('info.comisiones');
            Route::post('/mostrar-comisiones','ReporteController@mostrarcomisiones')->name('info.mostrar-comisiones');
           
           //pagos
            Route::get('/pagos','ReporteController@pagos')->name('info.pagos');
            Route::get('/pagosusuario','ReporteController@pagosusuario')->name('info.pagosusuario');
            Route::post('/buscar','ReporteController@buscar')->name('info.buscar');
           
           //reportes pagos
            Route::get('/reportes','ReporteController@reportes')->name('info.reportes');
            Route::post('/repor-fecha','ReporteController@reporfecha')->name('info.repor-fecha');
            Route::post('/todos','ReporteController@todos')->name('info.todos');
            Route::post('/nombre-bus','ReporteController@nombrebus')->name('info.nombre-bus');
            
            //reportes de comision
            Route::get('/repor-comi','ReporteController@reporcomi')->name('info.repor-comi');
            Route::post('/repor-todos','ReporteController@reportodos')->name('info.repor-todos');
            
            //reporte de ventas
            Route::get('/ventas','ReporteController@ventas')->name('info.ventas');
            Route::post('/informe_fecha','ReporteController@informe_fecha')->name('info.informe_fecha');
            Route::post('/informe_ventas','ReporteController@informe_ventas')->name('info.informe_ventas');
            
            //liquidacion
            Route::get('/liquidacion','ReporteController@liquidacion')->name('info.liquidacion');
  
            // descuento
            Route::get('/feed', 'ReporteController@descuentos')->name('info.descuento');
            
            
            //informe de ganancias
            Route::get('/ganancia','ReporteController@ganancia')->name('info.ganancia');
            
            //informe de referidos
             Route::get('/referidoscompleto','ReporteController@referidoscompleto')->name('info.referidoscompleto');
      });
      
      //gestion de perfiles
       Route::group(['prefix' => 'gestion'], function(){
         //buscar usuarios para vision de usuario
          Route::get('/buscar','GestionController@buscar')->name('admin.buscar');
          Route::post('/vista','GestionController@vista')->name('admin.vista');
  
           //perfil
           Route::get('/verusuario/{id}', 'GestionController@verusuario')->name('gestion.verusuario');
           Route::get('/gestionperfiles', 'GestionController@gestionperfiles')->name('gestion.gestionperfiles');
            Route::post('/gestion','GestionController@gestion')->name('gestion.gestion');
            Route::get('/encontrado','GestionController@encontrado')->name('gestion.encontrado');
            
            //ingresos liberados
            Route::get('/ingresos/{id}','GestionController@ingresos')->name('gestion.ingresos');
            Route::get('/ingresos-valor','GestionController@ingresos_valor')->name('gestion.ingresos-valor');
            
            //ingresos detallados
            Route::get('/ingresos-detallado','GestionController@ingresos_detallado')->name('gestion.ingresos-detallado');
            
            //referidos
            Route::get('/referidos/{id}','GestionController@referidos')->name('gestion.referidos');
            Route::get('/directos','GestionController@directos')->name('gestion.directos');
            
            //billetera
            Route::get('/wallet/{id}','GestionController@wallet')->name('gestion.wallet');
            Route::get('/billetera','GestionController@billetera')->name('gestion.billetera');
            
            //pagos
            Route::get('/pago/{id}','GestionController@pago')->name('gestion.pago');
            Route::get('/liberado','GestionController@liberado')->name('gestion.liberado');
            
       });
       
       //herramientas subida de archivos
      Route::group(['prefix' => 'archivo'], function(){
        Route::get('/subir','ArchivoController@subir')->name('archivo.subir');
        Route::post('/subida','ArchivoController@subida')->name('archivo.subida');
        Route::get('/ver','ArchivoController@ver')->name('archivo.ver');
        Route::get('/mejorar/{id}','ArchivoController@mejorar')->name('archivo.ver-mejorar');
        Route::post('/actual','ArchivoController@actual')->name('archivo.ver-actual');
        Route::get('/{id}/destruir',['uses' => 'ArchivoController@destruir', 'as' => 'archivo.destruir']);
        Route::get('/descargar/{id}','ArchivoController@descargar')->name('archivo.ver-descargar');
      
        //gestion de noticias
        Route::get('/noticias', 'ArchivoController@noticias')->name('archivo.noticias');
        Route::post('/guardar',[ 'uses' => 'ArchivoController@guardar', 'as' => 'archivo.guardar']);
      
          Route::get('/contenido', 'ArchivoController@contenido')->name('archivo.contenido');
          Route::get('/{id}/eliminar', 'ArchivoController@eliminar')->name('archivo.eliminar');
            Route::get('/{id}/actualizar', 'ArchivoController@actualizar')->name('archivo.actualizar');
            Route::put('/{id}/modificar', 'ArchivoController@modificar')->name('archivo.modificar');
            
            //gestion de anuncios
            Route::get('/anuncios', 'ArchivoController@anuncios')->name('archivo.anuncios');
            Route::post('/saveanuncio', 'ArchivoController@saveanuncio')->name('archivo-saveanuncio');
            
            
            Route::get('/edicion', 'ArchivoController@edicion')->name('archivo.edicion');
            Route::get('eliminaranuncio/{id}', 'ArchivoController@eliminaranuncio')->name('archivo.eliminaranuncio');
            Route::post('actualizaranuncio', 'ArchivoController@actualizaranuncio')->name('archivo.actualizaranuncio');
            
            //muestra de correos
            Route::get('/vistacorreo', 'SettingController@vistacorreo')->name('archivo.vistacorreo');
            Route::post('miscorreoactivos', 'SettingController@miscorreoactivos')->name('archivo.miscorreoactivos');
            
      });
  
      Route::group(['prefix' => 'user'], function(){
          Route::get('/edit', 'ActualizarController@editProfile')->name('admin.user.edit');
          Route::put('update', 'ActualizarController@updateProfile')->name('admin.user.update');
          Route::put('actualizar/{id}', 'ActualizarController@actualizar')->name('admin.user.actualizar');    
          
          //codigo para editar perfil
          Route::get('/enviocodigo/{id}', 'ActualizarController@enviocodigo')->name('users-codigo');
          
          Route::get('/verificarcodigo/{id}/{codigo}', 'ActualizarController@verificarcodigo')->name('users-codigo-verificar');
      });
      
      //Historial de actividades
      Route::group(['prefix' => 'actividad'], function(){
          Route::get('/actividad', 'ActividadController@actividad')->name('actividad.actividad');
      });
  
  
      Route::group(['prefix' => 'network'], function(){   
          Route::get('/commissionsrecords', 'ComisionesController@ObtenerUsuarios')->name('commissionsrecords');
          Route::get('/commissionspayment', 'ComisionesController@ObtenerUsuarios')->name('commissionspayment');
          Route::get('/aprobarcomision/{id}', 'ComisionesController@aprobarComision')->name('comisiones.aprobar');
      });
  
      // transaciones
      Route::group(['prefix' => 'transactions'], function(){
          Route::get('/personalorders', 'TransacionesController@personal_orders')->name('personalorders');
          Route::get('/networkorders', 'TransacionesController@network_orders')->name('networkorders');
          Route::post('/buscarpersonalorder','TransacionesController@buscarpersonalorder')->name('buscarpersonalorder');
          Route::post('/buscarnetworkorder','TransacionesController@buscarnetworkorder')->name('buscarnetworkorder');
           Route::get('/directas', 'TransacionesController@ordenes_directas')->name('directas');
      });
      
       Route::group(['prefix' => 'puntos'], function(){
           
          Route::get('/puntos','PuntosController@puntos')->name('puntos.puntos');
          Route::post('/fechas','PuntosController@filtro_fechas')->name('puntos.fechas');
          Route::post('/nombre','PuntosController@nombre_usuario')->name('puntos.nombre');
          Route::get('/mis_puntos','PuntosController@mis_puntos')->name('puntos.mis_puntos');
           
           //mostramos los puntos debitables y de almacenamiento
          Route::get('/almacenados', 'PuntosController@almacenados')->name('wallet-almacenados');
          Route::get('/debitables', 'PuntosController@debitables')->name('wallet-debitables');
      });
      
      Route::group(['prefix' => 'ticket'], function(){
          Route::get('/ticket','TicketController@ticket')->name('ticket');
          Route::post('/generarticket','TicketController@generarticket')->name('generarticket');
          Route::get('/misticket','TicketController@misticket')->name('misticket');
          Route::get('/{id}/comentar','TicketController@comentar')->name('comentar');
          Route::post('/{id}/subir','TicketController@subir')->name('subir');
          Route::get('/todosticket','TicketController@todosticket')->name('todosticket');
          Route::get('/{id}/ver','TicketController@ver')->name('ver');
          Route::get('/{id}/cerrar','TicketController@cerrar')->name('cerrar');
      });
      
      
      
      Route::group(['prefix' => 'binario'], function(){
          //bono binario
         Route::get('/verbinario', 'BinarioController@ver')->name('setting-binario-ver');
          Route::get('/aceptar/{id}', 'BinarioController@aceptar')->name('setting-binario-aceptar');
          
           Route::get('/cancelar/{id}', 'BinarioController@cancelar')->name('setting-binario-cancelar');
           
           Route::get('/aceptartodo', 'BinarioController@aceptar_todo')->name('setting-binario-todo');
           
           Route::post('/usuario', 'BinarioController@usuario')->name('setting-binario-usuario');
           
           Route::post('/fechas', 'BinarioController@filtro_fechas')->name('setting-binario-fechas');
           
           
           //bono inicio
           Route::get('/verinicio', 'BinarioController@verinicio')->name('setting-inicio-verinicio');
           
          Route::get('/aceptarinicio/{id}', 'BinarioController@aceptar_inicio')->name('setting-inicio-aceptar');
          
           Route::get('/aceptartodoinicio', 'BinarioController@aceptar_todo_inicio')->name('setting-inicio-todo');
          
           Route::get('/cancelarinicio/{id}', 'BinarioController@cancelar_inicio')->name('setting-inicio-cancelar');
           
           Route::post('/usuarioinicio', 'BinarioController@usuario_inicio')->name('setting-inicio-usuario');
           
           Route::post('/fechasinicio', 'BinarioController@filtro_fechas_inicio')->name('setting-inicio-fechas');
           
           
           //configuracion del binario
           Route::get('/configuracion', 'BinarioController@confi')->name('binario-configuracion');
           
           Route::post('/binarioguardado', 'BinarioController@save')->name('binario-save');
           Route::post('/binarioiniciado', 'BinarioController@save_iniciado')->name('binario-iniciado');
           Route::post('/patrocinador', 'BinarioController@save_patrocinador')->name('binario-patrocinador');
      });
      
      
      Route::group(['prefix' => 'correo'], function(){
          Route::get('/email','CorreoController@vista')->name('correo-vista');
          Route::post('/subir','CorreoController@subir')->name('correo-subir');
          //agregar la firma al correo
          Route::get('/firma','CorreoController@firma')->name('correo-firma');
          Route::post('/firmado','CorreoController@firmado')->name('correo-firmado');
          
          Route::get('/correoprospeccion{id}','CorreoController@correoprospeccion')->name('correo-prospeccion');
          
          Route::post('/prospeccionenviar','CorreoController@envioprospecto')->name('correo-envioprospecto');
        
      });
      
      
      Route::group(['prefix' => 'chat'], function(){
          
          //chat privado
          Route::get('/chat','ChatController@chat')->name('chat-inicio');
          Route::get('/privado/{id}','ChatController@privado')->name('chat-privado');
          Route::post('/guardarprivado','ChatController@guardarprivado')->name('chat-guardar-privado');
          //buscador en tiempo real
          Route::get('nombres/buscador','ChatController@buscador')->name('getbuscador');
        
        //chat publico
        Route::get('/publico','ChatController@publico')->name('chat-publico');
          Route::get('/publicoadmin/{id}','ChatController@publicoadmin')->name('chat-publicoadmin');
          Route::post('/guardarpublico','ChatController@guardarpublico')->name('chat-guardar-publico');
        
      });
      
       Route::group(['prefix' => 'calendario'], function(){
          
          //calenario
          Route::get('/calendario','CalendarioController@calendario')->name('calendario-calendario');
          
          Route::post('/calendarioguardar','CalendarioController@guardar')->name('calendario-guardar');
          
          Route::post('/calendariomodificar','CalendarioController@modificar')->name('calendario-modificar');
          
         Route::post('/calendarioeliminar','CalendarioController@eliminar')->name('calendario-eliminar');
         
         Route::get('/calendarioprospecto/{id}','CalendarioController@calendarioprospecto')->name('calendario-calendarioprospecto');
      });
      
      
      Route::group(['prefix' => 'procesadorpago'], function(){
          
          //paypal
         Route::post('/paypal','ProcesadorPago\ProcesadorPagoController@paypal')->name('pago.payal');
         
         Route::get('/pay/{pagina}/{total}/{descripcion}/{idcompra}/accion', 'ProcesadorPago\PaypalController@pay')->name('pago-pay');
         
         Route::get('payment/status/{idcompra}', array(
      'as' => 'payment.status',
      'uses' => 'ProcesadorPago\PaypalController@getPaymentStatus',
         ));
          
      });
      
      Route::group(['prefix' => 'notas'], function(){
          
          Route::get('/notas','NotasController@inicio')->name('notas-inicio');
          
          Route::post('/guardar','NotasController@guardar')->name('notas-guardar');
          
          Route::get('/eliminar/{id}','NotasController@eliminar')->name('notas-eliminar');
          Route::post('/editar','NotasController@editar')->name('notas-editar');
          
      });
      
      
      
      Route::group(['prefix' => 'prospeccion'], function(){
          
          Route::get('/inicio','ProspeccionController@inicio')->name('prospeccion-inicio');
          
          Route::post('/guardar','ProspeccionController@guardar')->name('prospeccion-guardar');
          
          Route::get('/eliminar/{id}','ProspeccionController@eliminar')->name('prospeccion-eliminar');
          Route::post('/editar','ProspeccionController@editar')->name('prospeccion-editar');
          Route::post('/insertar','ProspeccionController@insertar')->name('prospeccion-insertar');
          Route::get('/correo/{id}','ProspeccionController@correo')->name('prospeccion-correo');
          
          Route::post('/cambioestado','ProspeccionController@cambioestado')->name('prospeccion-cambioestado');
          
      });
    }); 
      
  Route::group(['prefix' => 'link','middleware' => ['menu']], function(){
      
          //link para ver los productos    
          Route::get('/link','LinkController@link')->name('link.tienda');
          
          //link para ver los productos    
          Route::get('/linktienda','LinkController@linktienda')->name('link.tienda-completa');
          
          //buscador de productos sin iniciar sesion
          Route::post('/linkbuscar','LinkController@linkbuscar')->name('link.tienda-buscar');
          
          //metodos de compras para el carrito
           Route::get('/metodo', 'LinkController@metodo')->name('link-metodo');
           Route::post('/subir','LinkController@subir')->name('metodo.subir');
           Route::get('/cambio/{id}', 'LinkController@cambio')->name('link-cambio');
           Route::get('/borrar/{id}', 'LinkController@borrar')->name('link-borrar');
          
          //carrito de compras
          Route::get('/guardar/{id}/{precio}/{sesion}/{referido}', 'CarritoController@guardar')->name('setting-guardar');
          Route::get('/carrito', 'CarritoController@carrito')->name('carrito-carrito');
          Route::post('/actualizar', 'CarritoController@actualizar')->name('carrito-actualizar');
          Route::get('/delete/{id}', 'CarritoController@delete')->name('carrito-delete');
          Route::get('/aceptar', 'CarritoController@aceptar')->name('carrito-aceptar');
          Route::get('/cancelar', 'CarritoController@cancelar')->name('carrito-cancelar');
          Route::get('/almacenar/{id}/{id2}', 'CarritoController@almacenar')->name('link-almacenar-carrito');
          Route::get('/envio/{id}', 'CarritoController@buscarcostoenvio')->name('link-costo-envio');
          
          
          //codigo qr
          Route::get('/codigo', 'LinkController@codigo')->name('link-codigo');
          Route::post('/insercion','LinkController@insercion')->name('link-insercion');
          Route::get('/qr', 'LinkController@mostrarqr')->name('link-qr');
            
          //subida de imagenes para ckeditor
          Route::post('ckeditor/image_upload', 'LinkController@upload')->name('upload');
          
      });
