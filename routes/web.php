<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Models\Event;
use App\Mail\EventCreate;

use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/

Route::get('/mail/{mail}', function ($mail) {
    $envio = null;
    $envio = Mail::to($mail)->send(new EventCreate);
    $respuesta = 'correo enviado a email: ' . $mail;
    return $respuesta;
})->name('mail');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/sponsor', function () {
    return view('sponsor');
})->name('sponsor');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'dashboard',
])->group(function () {

    Route::get('/dashboard', App\Http\Livewire\Dashboard::class )->name('dashboard');

    Route::get('/editevent', App\Http\Livewire\EditEvent::class )->name('editevent');

    Route::get('/generaltable', App\Http\Livewire\GeneralTable::class )->name('generaltable');

    Route::get('/faq', App\Http\Livewire\Faq::class )->name('faq');

    Route::post('/store', 'App\Http\Controllers\EventController@store' )->name('store');
    
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->prefix('admin')->group(function () {

    Route::get('/dashboard', App\Http\Livewire\Admin\Dashboard::class )->name('adminDashboard');

    Route::get('/eventdata', App\Http\Livewire\Admin\EventData::class )->name('adminEventdata');
    
    Route::get('/stopevent', App\Http\Livewire\Admin\StopEvent::class )->name('adminStopevent');

    Route::get('/generaltable', App\Http\Livewire\Admin\GeneralTable::class )->name('adminGeneraltable');

    Route::get('/partnertable', App\Http\Livewire\Admin\PartnerTable::class )->name('adminPartnertable');

    Route::get('/event/{slug}', App\Http\Livewire\Admin\EventShow::class )->name('adminEvent');

});

Route::get('/donate', App\Http\Livewire\Donate::class )->name('donate');
Route::get('/game', App\Http\Livewire\Game::class )->name('game');

Route::get('/event/{slug}', App\Http\Livewire\EventShow::class )->name('event');

Route::get('/l/{slug}', function ($slug) {
    $evento = Event::where('slug','LIKE','%'.$slug.'%' )->withCount(['shareds'])->first(); //->with('shareds')
    if (isset($evento)) {
        $evento->update([
            'shared_count' => $evento->shared_count + 1,
        ]);
        $evento->shareds()->create([
            'count' => $evento->shareds_count  + 1,
        ]);
    }
    return redirect('/event/'.$evento->slug);
})->name('link');
//Route Hooks - Do not delete//