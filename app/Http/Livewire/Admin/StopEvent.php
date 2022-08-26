<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StopEvent extends Component
{
    public $users;

    public function delete($id)
    {
        event::find($id)->delete();
        session()->flash('message', 'Event deleted.');
        $this->mount();
    }
    
    public function mount()
    {
        $this->users = User::with(['events' => function($query){
            return $query->where('status', 4);
        }])
        ->whereHas('events', function($query){
            return $query->where('status', 4);
        })
        ->get()
        ->filter(function ($user){
            return $user->hasRole('org');
        });
        //LOG::info($this->users);
    }

    public function render()
    {
        return view('livewire.admin.stop-event');
    }
}
