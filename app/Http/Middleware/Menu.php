<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Closure;

// modelo
use App\Models\SettingCliente;
use App\Models\SettingsEstructura;
use App\Models\SettingsPunto;
use App\Models\Binario;
use App\Models\Settings;
use App\Models\Menus;


class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {

            if(Auth::user()->rol_id == 0 || Auth::user()->rol_id == 1) {

                $menus = $this->menuAdmin();

            }elseif(Auth::user()->rol_id >= 2){

                $data = $this->menu('activos');
                $menus = $this->menuActivo($data);

            }elseif(Auth::user()->status == 0){

                $data = $this->menu('inactivos');
                $menus = $this->menuInactivo($data);

            }
            $settingCliente = SettingCliente::find(1);
            $settingEstructura = SettingsEstructura::find(1);
            View::share(compact('menus', 'settingCliente', 'settingEstructura'));
        }
        return $next($request);
    }


    public function menu($dato){

        if($dato == 'activos'){

            $date = Menus::find(1);

            $data = [
            'inicio' => json_decode($date->inicio),
            'actualizar' => json_decode($date->actualizar),
            'registro' =>  json_decode($date->registro),
            'registro_cliente' => json_decode($date->registro_cliente),
            'red' => json_decode($date->red_usuario),
            'eventos' => json_decode($date->eventos),
            'transacciones' => json_decode($date->transacciones),
            'billetera' => json_decode($date->billetera),
            'calendario' =>  json_decode($date->calendario),
            'informes' => json_decode($date->informes),
            'prospeccion' => json_decode($date->prospeccion),
            'correos' => json_decode($date->correos),
            'tickets' => json_decode($date->tickets),
            'ranking' =>  json_decode($date->ranking),
            'tienda' => json_decode($date->tienda),
            'herramientas' => json_decode($date->herramientas),
        ];

        }else{

            $date = Menus::find(2);

            $data = [
            'inicio' => json_decode($date->inicio),
            'actualizar' => json_decode($date->actualizar),
            'registro' =>  json_decode($date->registro),
            'registro_cliente' => json_decode($date->registro_cliente),
            'red' => json_decode($date->red_usuario),
            'eventos' => json_decode($date->eventos),
            'transacciones' => json_decode($date->transacciones),
            'billetera' => json_decode($date->billetera),
            'calendario' =>  json_decode($date->calendario),
            'informes' => json_decode($date->informes),
            'prospeccion' => json_decode($date->prospeccion),
            'correos' => json_decode($date->correos),
            'tickets' => json_decode($date->tickets),
            'ranking' =>  json_decode($date->ranking),
            'tienda' => json_decode($date->tienda),
            'herramientas' => json_decode($date->herramientas),
        ];
        }

        return $data;
    }

    /**
     * Devuelve el menu que se va a usar
     *
     * @return array
     */
   public function menuActivo($data)
    {
        $settings = Settings::first();
        $settingPuntos = SettingsPunto::find(1);

             $habilitar = 0;
             if (!empty($settingPuntos)) {
                 $habilitar = 1;
             }

             $automatico = 0;
             $binario = Binario::find(1);
              if(!empty($binario->binario)){
                  $automatico = 1;
              }


        return [
            'Inicio' => [
                'submenu' => 0,
                'ruta' => 'admin.index',
                'black'=> '0',
                'icono' => 'fa fa-home',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],

            'Academia' => [
                'submenu' => 0,
                'ruta' => 'index',
                'black'=> '0',
                'icono' => 'fas fa-exchange-alt',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],

            'Actualizar' => [
                'submenu' => 0,
                'ruta' => 'admin-update-all',
                'black'=> '0',
                'icono' => 'fas fa-sync',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],

            'Red De Usuario' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-user',
                'permisoAdmin' => 1,
                'activo' => (request()->is('admin/red*')) ? 'active' : '',
                'menus' => [
                    'Referidos' => [
                        'ruta' => 'red.directos',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Billetera' => [
                'submenu' => 0,
                'ruta' => 'wallet-index',
                'black'=> '0',
                'icono' => 'fas fa-wallet',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],


            'Informe de Comisiones' => [
                'submenu' => 0,
                'ruta' => 'wallet-repor-comision-new',
                'black'=> '0',
                'icono' => 'glyphicon glyphicon-list-alt',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],
        ];
    }



    /**
     * Devuelve el menu que se va a usar
     *
     * @return array
     */
    public function menuInactivo($data)
    {
        $settings = Settings::first();
        $settingPuntos = SettingsPunto::find(1);

             $habilitar = 0;
             if (!empty($settingPuntos)) {
                 $habilitar = 1;
             }

             $automatico = 0;
             $binario = Binario::find(1);
              if(!empty($binario->binario)){
                  $automatico = 1;
              }

              $red = 0;
              if((request()->is('referraltree*')) ? 'active' : ''){
                  $red ='active';
              }elseif((request()->is('admin/users/directrecords')) ? 'active' : ''){
                 $red ='active';
              }elseif((request()->is('admin/users/networkrecords')) ? 'active' : ''){
                  $red ='active';
              }



        return [
            'Inicio' => [
                'submenu' => 0,
                'ruta' => 'admin.index',
                'black'=> '0',
                'icono' => 'fa fa-home',
                'complementoruta' => '',
                'permisoAdmin' => ($data['inicio']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],
            'Actualizar' => [
                'submenu' => 0,
                'ruta' => 'admin-update-all',
                'black'=> '0',
                'icono' => 'fas fa-sync',
                'complementoruta' => '',
                'permisoAdmin' => ($data['actualizar']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],
            'Nuevo Registro' => [
                'submenu' => 0,
                'ruta' => 'autenticacion.new-register',
                'black'=> '0',
                'icono' => 'fa fa-user-plus',
                'complementoruta' => '?ref='.Auth::user()->ID,
                'permisoAdmin' => ($data['registro']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],
            'Nuevo Registro Cliente' => [
                'submenu' => 0,
                'ruta' => 'autenticacion.new-register',
                'black'=> '0',
                'icono' => 'fa fa-user-plus',
                'complementoruta' => '?ref='.Auth::user()->ID.'&tipouser=Cliente',
                'permisoAdmin' => ($data['registro_cliente']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],
            'Red De Usuario' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-sitemap',
                'permisoAdmin' => ($data['red']->activo == 0) ? 0 : 1,
                'activo' => $red,
                'menus' => [
                    'Árbol de Usuarios' => [
                        'ruta' => 'referraltree',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Árbol de Cliente' => [
                        'ruta' => 'referraltree',
                        'complementoruta' => '?user=Cliente',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Registros Directos' => [
                        'ruta' => 'directrecords',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Registros en Red' => [
                        'ruta' => 'networkrecords',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],
            'Transacciones' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'far fa-money-bill-alt',
                'permisoAdmin' => ($data['transacciones']->activo == 0) ? 0 : 1,
                'activo' => (request()->is('admin/transactions*')) ? 'active' : '',
                'menus' => [
                    'Ordenes Personales' => [
                        'ruta' => 'personalorders',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Ordenes de Red' => [
                        'ruta' => 'networkorders',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Ventas por link personal' => [
                        'ruta' => 'directas',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Billetera' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-wallet',
                'complementoruta' => '',
                'permisoAdmin' => ($data['billetera']->activo == 0) ? 0 : 1,
                'activo' => (request()->is('admin/wallet*')) ? 'active' : '',
                'menus' => [
                    'Mi Billetera' => [
                        'ruta' => 'wallet-index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Historial de Transferencias' => [
                        'ruta' => 'wallet-historial',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Historial de Cortes' => [
                        'ruta' => 'wallet-cortes',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Canje de Puntos' => [
                        'ruta' => 'cambio-canje',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> ($settings->canje == 1) ? 'activo' : 'inactivo',
                    ],
                ]
            ],

            'Calendario' => [
                'submenu' => 0,
                'ruta' => 'calendario-calendario',
                'black'=> '0',
                'icono' => 'fas fa-calendar-alt',
                'complementoruta' => '',
                'permisoAdmin' => ($data['calendario']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],

            'Informes' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'glyphicon glyphicon-list-alt',
                'complementoruta' => '',
                'permisoAdmin' => ($data['informes']->activo == 0) ? 0 : 1,
                'activo' => (request()->is('admin/info*')) ? 'active' : '',
                'menus' => [
                    'Activacion' => [
                        'ruta' => 'info.activacion',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Comisiones' => [
                        'ruta' => 'info.comisiones',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Liquidacion' => [
                        'ruta' => 'info.liquidacion',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Reportes Comisiones' => [
                        'ruta' => 'info.repor-comi',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Reportes Afiliados' => [
                        'ruta' => 'info.referidoscompleto',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],


            'Sistema de Prospección' => [
                'submenu' => 0,
                'ruta' => 'prospeccion-inicio',
                'black'=> '0',
                'icono' => 'fas fa-network-wired',
                'complementoruta' => '',
                'permisoAdmin' => ($data['prospeccion']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],

            'Envio de correos' => [
                'submenu' => 0,
                'ruta' => 'correo-vista',
                'black'=> '0',
                'icono' => 'fas fa-envelope-open-text',
                'complementoruta' => '',
                'permisoAdmin' => ($data['correos']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],


            'Tickets/Soporte' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-ticket-alt',
                'complementoruta' => '',
                'permisoAdmin' => ($data['tickets']->activo == 0) ? 0 : 1,
                'activo' => (request()->is('admin/ticket*')) ? 'active' : '',
                'menus' => [
                    'Generar Tickets/Soporte' => [
                        'ruta' => 'ticket',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Mis Tickets/Soporte' => [
                        'ruta' => 'misticket',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    /*
                    'Todos Los Tickets/Soporte' => [
                        'ruta' => 'todosticket',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    */
                ]
            ],
            'Ranking' => [
                'submenu' => 0,
                'ruta' => 'admin.ranking',
                'black'=> '0',
                'icono' => 'fa fa-star',
                'complementoruta' => '',
                'permisoAdmin' => ($data['ranking']->activo == 0) ? 0 : 1,
                'activo' => 0,
            ],

            'Tienda' => [
                'submenu' => 1,
                'ruta' => 'javascript',
                'icono' => 'glyphicon glyphicon-shopping-cart',
                'complementoruta' => '',
                'permisoAdmin' => ($data['tienda']->activo == 0) ? 0 : 1,
                'activo' => (request()->is('tienda*')) ? 'active' : '',
                'menus' => [
                    'Productos' => [
                        'ruta' => 'tienda-index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Informacion Bancaria' => [
                        'ruta' => 'bancaria-descargar',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Soporte de Pagos' => [
                        'ruta' => 'link-pago',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Lista de Soporte' => [
                        'ruta' => 'link-listado',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Paypal' => [
                        'ruta' => ''.$settings->paypal,
                        'complementoruta' => '',
                        'black'=> '1',
                        'oculto'=> (!empty($settings->paypal)) ? 'activo' : 'inactivo',
                    ],

                    'Pagar con Paypal' => [
                        'ruta' => 'setting-paypal-util',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> (!empty($settings->scriptpaypal)) ? 'activo' : 'inactivo',
                    ],
                ]
            ],

            'Herramientas' => [
                'submenu' => 1,
                'ruta' => 'javascript',
                'icono' => 'fas fa-toolbox',
                'complementoruta' => '',
                'permisoAdmin' => ($data['herramientas']->activo == 0) ? 0 : 1,
                'activo' => (request()->is('admin/archivo*')) ? 'active' : '',
                'menus' => [
                    'Documentos' => [
                        'ruta' => 'archivo.ver',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Blog y Artículos' => [
                        'ruta' => 'archivo.contenido',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Notas' => [
                        'ruta' => 'notas-inicio',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                     'Activacion de Correos' => [
                        'ruta' => 'archivo.vistacorreo',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ]
                ]
            ]
        ];
    }

    /**
     * Devuelve el menu que se va a usar
     *
     * @return array
     */
  public function menuAdmin()
    {
        $permiso = null;
        $settings = Settings::first();

            $permiso = DB::table('settingpermiso')->where('iduser', Auth::user()->ID)->get()[0];

             $habilitar = 0;
             $settingPuntos = SettingsPunto::find(1);
             if (!empty($settingPuntos)) {
                 if($permiso->puntos == 1){
                 $habilitar = 1;
                  }
             }

             $automatico = 0;
             $binario = Binario::find(1);
              if(!empty($binario->binario)){
                  if($permiso->binario == 1){
                  $automatico = 1;
                  }
              }

              $inicio = 0;
              if(!empty($binario->inicio)){
                 if($permiso->binario == 1){
                  $inicio = 1;
                  }
              }

              $red = 0;
              if((request()->is('referraltree*')) ? 'active' : ''){
                  $red ='active';
              }elseif((request()->is('admin/users/directrecords')) ? 'active' : ''){
                 $red ='active';
              }elseif((request()->is('admin/users/networkrecords')) ? 'active' : ''){
                  $red ='active';
              }


        return [
            'Inicio' => [
                'submenu' => 0,
                'ruta' => 'admin.index',
                'black'=> '0',
                'icono' => 'fa fa-home',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],

            'Academia' => [
                'submenu' => 0,
                'ruta' => 'index',
                'black'=> '0',
                'icono' => 'fas fa-exchange-alt',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],

            'Actualizar' => [
                'submenu' => 0,
                'ruta' => 'admin-update-all',
                'black'=> '0',
                'icono' => 'fas fa-sync',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],

            'Usuarios' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-user',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->usuarios : 0,
                'activo' => 0,
                'menus' => [
                    'Administradores' => [
                        'ruta' => 'admin-users-administrador',
                        'complementoruta' => '?tip=0',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Moderador' => [
                        'ruta' => 'admin-users-administrador',
                        'complementoruta' => '?tip=1',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Mentor' => [
                        'ruta' => 'admin-users-administrador',
                        'complementoruta' => '?tip=2',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Cliente' => [
                        'ruta' => 'admin-users-administrador',
                        'complementoruta' => '?tip=3',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Nuevo Usuario' => [
                        'ruta' => 'autenticacion.new-register',
                        'complementoruta' => '?ref='.Auth::user()->ID.'&select=true',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],


             'Entradas' => [
                 'submenu' => 0,
                 'ruta' => 'admin-users-entrada',
                 'black'=> '0',
                 'icono' => 'fas fa-door-closed',
                 'complementoruta' => '',
                 'permisoAdmin' => (!empty($permiso)) ? $permiso->entradas : 0,
                 'activo' => 0,
             ],

            'Red' => [
                'submenu' => 0,
                'ruta' => 'admin-red-index',
                'black'=> '0',
                'icono' => 'fas fa-users',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->red : 0,
                'activo' => 0,
            ],

            'Historial de comisiones' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-landmark',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->historialcomision  : 0,
                'activo' => (request()->is('admin/wallet*')) ? 'active' : '',
                'menus' => [
                    'Historial' => [
                        'ruta' => 'wallet-index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Informe de Comisiones' => [
                        'ruta' => 'wallet-repor-comision-new',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Cursos' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fab fa-discourse',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->cursos : 0,
                'activo' => 0,
                'menus' => [
                    'Listado de Cursos' => [
                        'ruta' => 'admin.courses.index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Gestionar Categorías' => [
                        'ruta' => 'admin.courses.categories',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Gestionar Subcategorías' => [
                        'ruta' => 'admin.courses.subcategories',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Gestionar Etiquetas' => [
                        'ruta' => 'admin.courses.tags',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Gestionar Insignias' => [
                        'ruta' => 'insignia.index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Estadisticas de Cursos' => [
                        'ruta' => 'admin.courses.estadistica',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Cursos mas vistos' => [
                        'ruta' => 'admin.courses.vistos',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],
            'Eventos' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-calendar-day',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->eventos : 0,
                'activo' => request()->is('admin/events') ? 'active' : 0,
                'menus' => [
                    'Listado de Eventos' => [
                        'ruta' => 'admin.events.index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                ]
            ],
            'Banners' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-ad',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->banners : 0,
                'activo' => request()->is('admin/banners') ? 'active' : 0,
                'menus' => [
                    'Banners Activos' => [
                        'ruta' => 'admin.banners.index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Banners Inactivos' => [
                        'ruta' => 'admin.banners.disabled',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],
            'Historial de Compras' => [
                'submenu' => 0,
                'ruta' => 'admin.purchases-record',
                'black'=> '0',
                'icono' => 'fa fa-shopping-cart',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->cursos : 0,
                'activo' => 0,
            ],

            /*
            'Nuevo Registro' => [
                'submenu' => 0,
                'ruta' => 'autenticacion.new-register',
                'black'=> '0',
                'icono' => 'fa fa-user-plus',
                'complementoruta' => '?ref='.Auth::user()->ID,
                'permisoAdmin' => (!empty($permiso)) ? $permiso->nuevo_registro : 0,
                'activo' => 0,
            ],
            'Nuevo Registro Cliente' => [
                'submenu' => 0,
                'ruta' => 'autenticacion.new-register',
                'black'=> '0',
                'icono' => 'fa fa-user-plus',
                'complementoruta' => '?ref='.Auth::user()->ID.'&tipouser=Cliente',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->nuevo_registro : 0,
                'activo' => 0,
            ],
            'Red De Usuario' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-sitemap',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->red_usuario : 0,
                'activo' => $red,
                'menus' => [
                    'Árbol de Usuarios' => [
                        'ruta' => 'referraltree',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Árbol de Cliente' => [
                        'ruta' => 'referraltree',
                        'complementoruta' => '?user=Cliente',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Registros Directos' => [
                        'ruta' => 'directrecords',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Registros en Red' => [
                        'ruta' => 'networkrecords',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],
            'Transacciones' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'far fa-money-bill-alt',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->transacciones : 0,
                'activo' => (request()->is('admin/transactions*')) ? 'active' : '',
                'menus' => [
                    'Ordenes Personales' => [
                        'ruta' => 'personalorders',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Ordenes de Red' => [
                        'ruta' => 'networkorders',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Ventas por link personal' => [
                        'ruta' => 'directas',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Visión de Usuario' => [
                'submenu' => 0,
                'ruta' => 'admin.buscar',
                'black'=> '0',
                'icono' => 'fa fa-address-card',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->vision_usuario : 0,
                'activo' => 0,
            ],
            */
            'Lista de Usuarios' => [
                'submenu' => 0,
                'ruta' => 'users.records',
                'black'=> '0',
                'icono' => 'fa fa-user-circle',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->usuario : 0,
                'activo' => 0,
            ],


            'Envio de correos' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-envelope-open-text',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->correos : 0,
                'activo' => (request()->is('admin/settings*')) ? 'active' : '',
                'menus' => [
                    'Correos a la Red' => [
                        'ruta' => 'correo-vista',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Notificaciones de eventos' => [
                        'ruta' => 'settings-correo-anexar',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Pop up' => [
                'submenu' => 0,
                'ruta' => 'setting-pop',
                'black'=> '0',
                'icono' => 'fas fa-window-restore',
                'complementoruta' => '',
                'permisoAdmin' => 1,
                'activo' => 0,
            ],
            'Soporte' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-tools',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->tickets : 0,
                'activo' => request()->is('admin/soporte/article') ? 'active' : 0,
                'menus' => [
                    'Articulos' => [
                        'ruta' => 'admin.soporte.article',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                ]
            ],


            /*
            'Binario' => [
                'submenu' => 0,
                'ruta' => 'setting-binario-ver',
                'black'=> '0',
                'icono' => 'fas fa-asterisk',
                'complementoruta' => '',
                'permisoAdmin' => $automatico,
                'activo' => 0,
            ],

            'Bono Inicio' => [
                'submenu' => 0,
                'ruta' => 'setting-inicio-verinicio',
                'black'=> '0',
                'icono' => 'fas fa-haykal',
                'complementoruta' => '',
                'permisoAdmin' => $inicio,
                'activo' => 0,
            ],

            'Puntos Almacenados' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-check-circle',
                'complementoruta' => '',
                'permisoAdmin' => $automatico,
                'activo' => (request()->is('admin/puntos*')) ? 'active' : '',
                'menus' => [
                    'Puntos Almacenados' => [
                        'ruta' => 'wallet-almacenados',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Puntos Debitables' => [
                        'ruta' => 'wallet-debitables',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Calendario' => [
                'submenu' => 0,
                'ruta' => 'calendario-calendario',
                'black'=> '0',
                'icono' => 'fas fa-calendar-alt',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->calendario : 0,
                'activo' => 0,
            ],


            'Billetera' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-wallet',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->billetera : 0,
                'activo' => (request()->is('admin/wallet*')) ? 'active' : '',
                'menus' => [
                    'Mi Billetera' => [
                        'ruta' => 'wallet-index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Comisiones a pagar' => [
                        'ruta' => 'wallet-comisiones-pagar',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Recarga Billetera' => [
                        'ruta' => 'wallet.recarga',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> ($settings->recarga == 1) ? 'activo' : 'inactivo',
                    ],

                    'Canje de Puntos' => [
                        'ruta' => 'cambio-lista',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> ($settings->canje == 1) ? 'activo' : 'inactivo',
                    ],
                ]
            ],


            'Puntos' => [
                'submenu' => 0,
                'ruta' => 'puntos.puntos',
                'black'=> '0',
                'icono' => 'fas fa-check-circle',
                'complementoruta' => '',
                'permisoAdmin' => $habilitar,
                'activo' => 0,
            ],
            'Pago' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fa fa-credit-card',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->pago : 0,
                'activo' => (request()->is('admin/price*')) ? 'active' : '',
                'menus' => [
                    'Historial de Pagos' => [
                        'ruta' => 'price-historial',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Confirmar Pagos' => [
                        'ruta' => 'price-confirmar',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],
            'Informes' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'glyphicon glyphicon-list-alt',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->informes : 0,
                'activo' => (request()->is('admin/info*')) ? 'active' : '',
                'menus' => [
                    'Perfil' => [
                        'ruta' => 'info.perfil',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Venta' => [
                        'ruta' => 'info.ventas',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Rangos' => [
                        'ruta' => 'info.rango',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Pagos' => [
                        'ruta' => 'info.pagos',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Descuentos' => [
                        'ruta' => 'info.descuento',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Reportes Pago' => [
                        'ruta' => 'info.reportes',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Reportes Afiliados' => [
                        'ruta' => 'info.referidoscompleto',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Reportes Comisiones' => [
                        'ruta' => 'info.ganancia',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],

            'Tickets/Soporte' => [
                'submenu' => 0,
                'ruta' => 'todosticket',
                'black'=> '0',
                'icono' => 'fas fa-ticket-alt',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->tickets : 0,
                'activo' => 0,
            ],
            'Ranking' => [
                'submenu' => 0,
                'ruta' => 'admin.ranking',
                'black'=> '0',
                'icono' => 'fa fa-star',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->ranking : 0,
                'activo' => 0,
            ],
            'Historial de Actividad' => [
                'submenu' => 0,
                'ruta' => 'actividad.actividad',
                'black'=> '0',
                'icono' => 'fa fa-history',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->historial_actividades : 0,
                'activo' => 0,
            ],

            'Prospección' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'icono' => 'fas fa-network-wired',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->prospeccion : 0,
                'activo' => (request()->is('admin/prospeccion*')) ? 'active' : '',
                'menus' => [
                    'Email Marketing' => [
                        'ruta' => 'http://emailsync.co/sistema/customer/index.php/guest/index',
                        'complementoruta' => '',
                        'black'=> '1',
                        'oculto'=> 'activo',
                    ],
                    'Administrar Redes' => [
                        'ruta' => 'https://appsocial.co/auth/login',
                        'complementoruta' => '',
                        'black'=> '1',
                        'oculto'=> 'activo',
                    ],

                    'Sistema de Prospección' => [
                        'ruta' => 'prospeccion-inicio',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                ]
            ],


            'Soporte' => [
                'submenu' => 0,
                'ruta' => 'https://sinergiared.com/clientes/index.php/signin',
                'black'=> '1',
                'icono' => 'fas fa-user-cog',
                'complementoruta' => 'externo',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->soporte : 0,
                'activo' => 0,
            ],
            'Tienda' => [
                'submenu' => 1,
                'ruta' => 'javascript',
                'icono' => 'glyphicon glyphicon-shopping-cart',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->tienda : 0,
                'activo' => (request()->is('tienda*')) ? 'active' : '',
                'menus' => [
                    'Productos' => [
                        'ruta' => 'tienda-index',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Agregar Productos' => [
                        'ruta' => 'tienda-accion-product',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Editar Productos' => [
                        'ruta' => 'tienda-product-nueva',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Crear Categorias' => [
                        'ruta' => 'tienda-listacat',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Solicitudes Compra' => [
                        'ruta' => 'tienda-solicitudes',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Informacion bancaria' => [
                        'ruta' => 'bancaria-bancaria',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Soporte de Pagos' => [
                        'ruta' => 'link-listado',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Paypal' => [
                        'ruta' => ''.$settings->paypal,
                        'complementoruta' => '',
                        'black'=> '1',
                        'oculto'=> (!empty($settings->paypal)) ? 'activo' : 'inactivo',
                    ],

                    'Pagar con Paypal' => [
                        'ruta' => 'setting-paypal-util',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> (!empty($settings->scriptpaypal)) ? 'activo' : 'inactivo',
                    ],
                ]
            ],
             */
            /*
            'Ajustes' => [
                'submenu' => 1,
                'ruta' => 'javascript',
                'icono' => 'fa fa-cogs',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->ajuste : 0,
                'activo' => (request()->is('admin/settings*')) ? 'active' : '',
                'menus' => [
                    'Sistema' => [
                        'ruta' => 'setting-logo',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Seguridad' => [
                        'ruta' => 'setting-seguridad',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Formulario' => [
                        'ruta' => 'setting-formulario',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],


                    'Configuración Cripto' => [
                        'ruta' => 'setting-btcconfi',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Comisiones' => [
                        'ruta' => 'setting-comisiones',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Estructura' => [
                        'ruta' => 'setting-estructura',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Rangos' => [
                        'ruta' => 'setting-rango',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Pagos' => [
                        'ruta' => 'setting-pago',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    /*
                    'Informe de Comisiones' => [
                        'ruta' => 'setting-ganancias',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Control de Gastos' => [
                        'ruta' => 'setting-admi-nistrador',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Plantilla de Correos' => [
                        'ruta' => 'setting-plantilla',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Permiso' => [
                        'ruta' => 'setting-permisos',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Activacion' => [
                        'ruta' => 'setting-activacion',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Editar Menus' => [
                        'ruta' => 'setting-menu',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Monedas' => [
                        'ruta' => 'setting-monedas',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Avatares Arbol' => [
                        'ruta' => 'setting-imagenes',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Redes Sociales' => [
                        'ruta' => 'setting-red',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Metodos de pago' => [
                        'ruta' => 'link-metodo',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Puntos' => [
                        'ruta' => 'setting-puntos',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Pop up' => [
                        'ruta' => 'setting-pop',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    /*
                    'Iva' => [
                        'ruta' => 'setting-iva',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Costo' => [
                        'ruta' => 'setting-depart',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Binario' => [
                        'ruta' => 'binario-configuracion',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Complementos especiales' => [
                        'ruta' => 'setting-comple',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Modulo Complementario' => [
                        'ruta' => 'setting-modulo',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Codigo QR' => [
                        'ruta' => 'link-codigo',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                ]
            ],
             */

             /*
            'Herramientas' => [
                'submenu' => 1,
                'ruta' => 'javascript',
                'icono' => 'fas fa-toolbox',
                'complementoruta' => '',
                'permisoAdmin' => (!empty($permiso)) ? $permiso->herramienta : 0,
                'activo' => (request()->is('admin/archivo*')) ? 'active' : '',
                'visto' => 2,
                'menus' => [
                    'Materiales' => [
                        'ruta' => 'archivo.ver',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],
                    'Blog y Artículos' => [
                        'ruta' => 'archivo.contenido',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Crear Anuncios' => [
                        'ruta' => 'archivo.anuncios',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Notas' => [
                        'ruta' => 'notas-inicio',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ],

                    'Lista Anuncios' => [
                        'ruta' => 'archivo.edicion',
                        'complementoruta' => '',
                        'black'=> '0',
                        'oculto'=> 'activo',
                    ]

                ]
            ]
            */
        ];
    }
}

