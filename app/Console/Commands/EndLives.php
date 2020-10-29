<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Events;
use App\Models\Streaming\Meeting;

class EndLives extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:lives';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar si han pasado más de 5 horas de iniciado el evento para finalizarlo';

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
            $eventos = Events::where('status', '=', 1)
                        ->where('date', '<=', date('Y-m-d'))
                        ->get();
            
            $horaActual = Carbon::now()->timezone("Africa/Accra");
            foreach ($eventos as $evento){
                $p = $evento->date."T".$evento->time;
                $horaEvento = new Carbon($p);
                $horaLimite = new Carbon($p);
                $horaLimite->addHours(5);

                if ($horaLimite < $horaActual){
                    $evento->status = 0;
                    $evento->save();

                    $meeting = Meeting::where('uuid', '=', $evento->uuid)->first();
                    $info = json_decode($meeting->meta);
                    $info->status = 'ended';
                    $meeting->meta = json_encode($info);
                    $meeting->save();
                }
            }
            
        } catch (\Throwable $th) {
            $this->info($th);
        }
    }
}
