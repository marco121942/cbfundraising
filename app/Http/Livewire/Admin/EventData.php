<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Event;
use App\Models\Notification;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventData extends Component
{
    public $users;

    public $duration, $status, $event_id;
    public $isModalOpen = 0;

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->resetCreateForm();
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->duration = '';
        $this->status = '';
        $this->event_id = '';
    }
    public function store()
    {
        $this->validate([
            'duration' => 'required',
            'status' => 'required',
        ]);
    
        $eventito = Event::updateOrCreate(['id' => $this->event_id], [
            'duration' => $this->duration,
            'status' => $this->status,
        ]);

        
        if ($this->status === 3) {
            $suceso = 5;
        }else if($this->status === 5){
            $suceso = 6;
        }else if($this->status === 1){
            $suceso = 3;
        }else{
            $suceso = $this->status;
        }

        Notification::create([
            'user_id' => $eventito->user_id,
            'receiver_id' => 1,
            'event_id' => $this->event_id,
            'view' => false,
            'success' => $suceso,
            'deleted_receiver' => false,
        ]);

        session()->flash('message', $this->event_id ? 'event updated.' : 'event created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
        $this->mount();
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->event_id = $id;
        $this->duration = $event->duration;
        $this->status = $event->status;

        Notification::create([
            'user_id' => $event->user_id,
            'receiver_id' => 1,
            'event_id' => $this->event_id,
            'view' => false,
            'success' => 3,
            'deleted_receiver' => false,
        ]);
            
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Event::updateOrCreate(['id' => $id], [
            'status' => 4,
        ]);
        // event::find($id)->delete();
        session()->flash('message', 'Event deleted.');
        $this->resetCreateForm();
        $this->mount();
    }
    
    public function mount()
    {
        $this->users = User::with('events','events.donations','events.shareds','events.points')
        ->whereHas('events', function($query){
            return $query->whereNotNull('status');
        })
        ->get()
        ->filter(function ($user){
            return $user->hasRole('org');
        });
        //LOG::info($this->users);
    }
   
    public function render()
    {
        return view('livewire.admin.event-data');
    }
}
