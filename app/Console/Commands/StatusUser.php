<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
// modelos
use App\Models\User;
use App\Models\SettingsRol;
// controladores
use App\Http\Controllers\ActivacionController;

class StatusUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar el estado de los usuario';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->reseteoRangoMensual();
            $users = User::where('rol_id', '!=', 0)->get();
            $activacion = new ActivacionController;
            foreach ($users as $user ) {
                $activacion->activarUsuarios($user->ID);
            }
            $this->info('Usuarios Verificados Correctamente');
        } catch (\Throwable $th) {
            $this->info($th);
        }
    }

    /**
     * Permite reseteal los rangos mensualmente, en los sistema que lo habiliten
     *
     * @return void
     */
    public function reseteoRangoMensual()
    {
        $settingsRol = SettingsRol::find(1);
        $fechaActual = Carbon::now();
        $findeMes = Carbon::now()->endOfMonth();
        if ($settingsRol->reseteomensual == 1 && $fechaActual == $findeMes) {
            $users = User::where([
                ['rol_id', '!=', 0],
                ['rol_id', '!=', 100],
                ['tipouser', '!=', 'Cliente']
            ])->get();
            foreach ($users as $user ) {
                User::where(['ID', $user->ID])->update(['rol_id' => 1]);
            }
        }
    }
}
