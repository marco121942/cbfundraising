<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Event;
use App\Models\Notification;

class CheckEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chequear Eventos Finalizados';

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
     * @return int
     */
    public function handle()
    {
        Log::info('desde el CheckEvent');

        $fechaActual = Carbon::now();
        
        $eventos = Event::where('status', '<', 3)->get();
        Log::info('se busca los eventos con estatus menor a tres');
        // Log::info($eventos->get());

        Log::info('se recorre los eventos');
        foreach ($eventos as $evento) {
            Log::info('se entra en el foreach');
            if ( isset( $evento->created_at ) ) {
                Log::info('el evento posee created_at');
                $fechaInicial = Carbon::parse($evento->created_at);
                // $fechaFinal = Carbon::parse($evento->created_at)->addDays($evento->duration);
                // $time = $fechaActual->diffInDays($fechaFinal);
                $diasTranscurridos = $fechaActual->diffInDays($fechaInicial);
                $time = $evento->duration - $diasTranscurridos;
                if ($time < 0) {
                    Log::info('ya no le quedan dias');
                    $status = 5;
                    $suceso = 6;
                    Log::info('se cambia el estatus del evento');
                    $eventito = Event::updateOrCreate(['id' => $evento->id], [
                        'status' => $status,
                    ]);
                    Log::info('se crea la notificacion');
                    Notification::create([
                        'user_id' => $eventito->user_id,
                        'receiver_id' => 1,
                        'event_id' => $eventito->event_id,
                        'view' => false,
                        'success' => $suceso,
                        'deleted_receiver' => false,
                    ]);
                }else{
                    Log::info('todavia le quedan dias');
                    Log::info('no cambia el estatus del evento');
                }
            }else{
                Log::info('el evento no posee created_at');
                Log::info('se cambia el estatus del evento');
                $eventito = Event::updateOrCreate(['id' => $evento->id], [
                    'status' => $status,
                ]);
                Log::info('se crea la notificacion');
                Notification::create([
                    'user_id' => $eventito->user_id,
                    'receiver_id' => 1,
                    'event_id' => $eventito->event_id,
                    'view' => false,
                    'success' => $suceso,
                    'deleted_receiver' => false,
                ]);
            };
        };
        Log::info('YA SE RECORRIO LOS EVENTOS');
        return 0;
    }
}
