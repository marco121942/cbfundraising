<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Event;

use Livewire\WithPagination;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GeneralTable extends Component
{
    use WithPagination;

    public $evento;

    public $points;

    public $porSemana;

    public $porDia;
    
    // public $raised;
    
    // public $donors;
    

    public function mount()
    {
    //----
        // $isAccessible = Arr::accessible(new Collection);
        // $isAccessible = Arr::accessible(new Collection);

        // los Arr::where El método filtra una matriz usando el cierre dado: 
        // $filtered = Arr::where($array, function ($value, $key) {
        //     return is_string($value);
        // });

        // los Arr::onlyEl método devuelve solo los pares clave / valor especificados de la matriz dada: 
        // $slice = Arr::only($array, ['name', 'price']);

        // los Arr::lastEl método devuelve el último elemento de una matriz que pasa una prueba de verdad dada: 
        // $last = Arr::last($array, function ($value, $key) {
        //     return $value >= 150;
        // });

        // los Arr::sortEl método ordena una matriz por sus valores: 
        // los Arr::sortEl método ordena una matriz por sus valores: 
        // $sorted = array_values(Arr::sort($array, function ($value) {
        //     return $value['name'];
        // }));


        // los Arr::divideEl método devuelve dos matrices: una que contiene las claves y la otra que contiene los valores de la matriz dada:
        // Arr::divide();

        //los data_getrecupera un valor de una matriz u objeto anidado usando la notación de "punto":
        //$price = data_get($data, 'products.desk.price', 0);

        //los lastfunción devuelve el último elemento en la matriz dada: 
        //$first = head($array);

        // los last función devuelve el último elemento en la matriz dada: 
        //$last = last($array);
    //----

        $fechaActual = Carbon::now()->format('Y-m-d');
        $ayer = Carbon::yesterday()->format('Y-m-d');
        
        $this->evento = Event::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if ( isset( $this->evento->created_at ) ) {
            
            $fechaInicial = Carbon::create($this->evento->created_at);
            
            Log::info('$fechaInicial');
            Log::info($fechaInicial);
            
        }else{
            $fechaInicial = '1999-01-01';
        }

        //---------
        if ( isset( $this->evento->points ) ) {
            $this->points = $this->evento->points()->get() ?? 0;
            $this->contarPorSemana();
            $this->contarPorDias();
        } else {
            $this->points = 0;
        }
        //---------------------
        

        // if ( isset( $this->points ) ) {
          
        //     foreach ($puntos as $punto) {
        //         $totalDonHoy += $punto->count;
        //         $totalMoneyHoy += $punto->money;
        //     };
        // } else {
        //     $totalDonHoy = 0;
        //     $totalMoneyHoy = 0;
        // };

        Log::info('desde el mount');
        
        
        Log::info('cierro desde el mount');

    }

    public function render()
    {
        return view('livewire.general-table');
    }

    public function contarPorSemana(){
            // Log::info('paso a la funcion por semanas');
            $cantSemanas = 0;
            $diasHabiles = $this->evento->duration;

            $fechaInicial = Carbon::create($this->evento->created_at);
            $fechaFinal = Carbon::create($this->evento->created_at)->addDays($diasHabiles);
            
            // Log::info('$fechaInicial desde la funcion');
            // Log::info($fechaInicial);
            // Log::info('$fechaFinal desde la funcion');
            // Log::info($fechaFinal);

            
            for ($j=1; $j < $diasHabiles; $j++) {
                // Log::info('$j');
                // Log::info($j);
                $limiteActual = 7 * $j;
                // Log::info('$limiteActual');
                // Log::info($limiteActual);

                if ($diasHabiles < $limiteActual) {
                    break;
                } else if ($diasHabiles === $limiteActual) {
                    break;
                } else if ($diasHabiles > $limiteActual) {
                    $index = 'Week' . $j;
                    $$index = Carbon::create($this->evento->created_at)->addDays($limiteActual);
                    $cantSemanas = $cantSemanas + 1;
                    continue;
                }
            }

            // Log::info('$cantSemanas');
            // Log::info($cantSemanas);
           
            $resultados = [];

            for ($q=1; $q <= $cantSemanas; $q++) { 
                // Log::info('$q');
                // Log::info($q);
                $index = 'Week' . $q;
                if ($index === 'Week1') {
                    $fechaFinPost = $$index;
                    Log::info('$fechaFinPost');
                    Log::info($fechaFinPost);

                    $filtered = $this->points->whereBetween('created_at', [$fechaInicial, $fechaFinPost])->sum('count');
                    $resultados[$index] = $filtered;
                }else{
                    $indexAnt = 'Week' . $q - 1;
                    $fechaInicPost = Carbon::create($$indexAnt)->addDays(1);
                    $fechaFinPost = $$index;

                    Log::info('$fechaInicPost');
                    Log::info($fechaInicPost);
                    Log::info('$fechaFinPost');
                    Log::info($fechaFinPost);

                    $filtered = $this->points->whereBetween('created_at', [$fechaInicPost, $fechaFinPost])->sum('count');
                    $resultados[$index] = $filtered;
                }
                // Log::info($index);
                // Log::info($$index);
            }
            // Log::info('$resultados[]');
            // Log::info($resultados);
             
            $this->porSemana = Arr::divide($resultados);

            Log::info('$this->porSemana');
            Log::info($this->porSemana);
            

    }
    public function contarPorDias(){
            Log::info('paso a la funcion por dias');
            $diasHabiles = $this->evento->duration;

            $fechaInicial = Carbon::create($this->evento->created_at);
            $fechaFinal = Carbon::create($this->evento->created_at)->addDays($diasHabiles);
            // Log::info('$fechaInicial desde la funcion');
            // Log::info($fechaInicial);
            // Log::info('$fechaFinal desde la funcion');
            // Log::info($fechaFinal);
            // Log::info('$diasHabiles');
            // Log::info($diasHabiles);

            
            for ($j=0; $j <= $diasHabiles; $j++) {
                // Log::info('$j');
                // Log::info($j);
                $limiteActual = 1 * $j;
                // Log::info('$limiteActual');
                // Log::info($limiteActual);

                if ($diasHabiles < $limiteActual) {
                    break;
                } else if ($diasHabiles === $limiteActual) {
                    break;
                } else if ($diasHabiles > $limiteActual) {
                    $index = 'dia' . $j + 1;
                    $$index = Carbon::create($this->evento->created_at)->addDays($limiteActual);
                    continue;
                }
            }
           
            $resultadosDia = [];

            for ($q=1; $q <= $diasHabiles; $q++) { 
                // Log::info('$q');
                // Log::info($q);
                $index = 'dia' . $q;

                $fechaInicPost = $$index;
                $fechaFinal = Carbon::create($fechaInicPost)->addDays(1);
                $filtered = $this->points->whereBetween('created_at', [$fechaInicPost, $fechaFinal])->sum('count');//->where('created_at', $fechaFinPost)
                // resultados[$index] = $filtered;
                $fechaMostrar = $fechaInicPost->format('j F Y');
                $resultadosDia[$fechaMostrar] = $filtered;

                // Log::info($index);
                // Log::info($$index);
                
                // Log::info('$filtered');
                // Log::info($filtered);
            }

            // Log::info('$resultadosDia[]');
            // Log::info($resultadosDia);
             //$this->porSemana = json_encode($resultados);
            //$dividido = Arr::divide($resultados);
            $this->porDia = Arr::divide($resultadosDia);
            Log::info('$this->porDia');
            Log::info($this->porDia);
            // Log::info($dividido);

    }
}
            // $filtered = Arr::where($arrPuntos, function ($value, $key, $fechaInicPost=$fechaInicPost, $fechaFinPost=$fechaFinPost) {
            //     return calcPeriodo($value,$fechaInicPost,$fechaFinPost);
            // });
            
            // function calcPeriodo($value,$fechaInicial,$fechaFinalPeriodo){
            //     $period = CarbonPeriod::between($fechaInicial, $fechaFinalPeriodo);
            //     // $days = [];
            //     foreach ($period as $date) {
            //         // $days[] = $date;
            //         $fechaValue = Carbon::create($value->created_at)->format('Y-m-d');
            //         if ($date->format('Y-m-d') === $fechaValue) {
            //             Log::info('$date');
            //             Log::info($date->format('Y-m-d'));
            //             Log::info('$fechaValue');
            //             Log::info($fechaValue);
            //             return true;
            //         }
            //     }
            //     // echo implode(', ', $days);

            // }