<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use DB;

class MembershipsExpirations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'membership:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar la fecha de expiración de la membresía de los usuarios';

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
            $fechaActual = date('Y-m-d');
            DB::table('wp98_users')
                ->where('membership_id', '<>', NULL)
                ->where('membership_status', '=', 1)
                ->where('membership_expiration', '<', $fechaActual)
                ->update(['membership_status' => 0]);
            
        } catch (\Throwable $th) {
            $this->info($th);
        }
    }
}
