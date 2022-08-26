<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Donation;
use App\Models\Partner;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EventShow extends Component
{
    use WithPagination;

    public $evento;

    public function mount($slug)
    {
        
        if (auth()->check()) {
            if (session()->has('redirect_to')) {
                session()->forget('redirect_to');
            }
            // session(['redirect_to' => url()->full()]);
            if (session()->has('back')) {
                session()->forget('back');
            }
            session(['back' => url()->full()]);
            $countGames = Donation::where('user_id', Auth::user()->id)->whereRaw('playeds < count')->get();
            $restantes = 0;
            foreach ($countGames as $jugadas) {
                $playeds = $jugadas->playeds;
                $count = $jugadas->count;
                $plays = $count - $playeds;
                $restantes += $plays;
            };
            if (session()->has('games')) {
                session()->forget('games'); 
            } 
            if ($restantes !== 0) {
                session(['games' => $restantes]);
            }else{
                if (session()->has('games')) {
                    session()->forget('games'); 
                }
            };
        }else{
            if (session()->has('redirect_to')) {
                session()->forget('redirect_to');
            }
            session(['redirect_to' => url()->full()]);
            if (session()->has('back')) {
                session()->forget('back');
            }
            session(['back' => url()->full()]);
        }

        $this->evento = Event::where('slug', $slug)->where('status', '<', 3)->first();

        if (isset($this->evento)) {
            $this->evento->update([
                'view_count' => $this->evento->view_count + 1,
            ]);
        }


        Log::info('desde el mount');
        Log::info($this->evento ?? 'no hay evento');
        Log::info('cierro desde el mount');
        Log::info('esta es la variable redirect_to desde session');
        Log::info( session('redirect_to') );
        Log::info('cierro la variable redirect_to desde session');

    }

    public function render()
    {
        $partner = Partner::get();
        return view('livewire.event-show',['partners' => $partner])
                ->layout('layouts.guest');
    }
}
