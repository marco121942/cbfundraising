<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Donation;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if (Auth::user()) {
            $countGames = null;
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
            if ($countGames) {
                session(['games' => $restantes]);
            }else{
                if (session()->has('games')) {
                    session()->forget('games'); 
                }
            };
        }
        return view('layouts.app');
    }
}
