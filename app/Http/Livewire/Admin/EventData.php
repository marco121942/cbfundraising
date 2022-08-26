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
    
        Event::updateOrCreate(['id' => $this->event_id], [
            'duration' => $this->duration,
            'status' => $this->status,
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
