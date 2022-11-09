@section('title', 'Event Data')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Event</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Event</li>
          <li class="breadcrumb-item active">Events data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <table class="table text-center">
            <thead>
              <tr class="py-auto">
                <th scope="col py-auto my-auto">#</th>
                <th scope="col py-auto my-auto">Usser</th>
                <th scope="col py-auto my-auto">Fundrising</th>
                <th scope="col py-auto my-auto">Estate</th>
                <th scope="col py-auto my-auto">Link</th>
                <th scope="col py-auto my-auto">Shared</th>
                <th scope="col py-auto my-auto">Time <br>remaining<br> (days)</th>
                <th scope="col py-auto my-auto">Donors</th>
                <th scope="col py-auto my-auto">Acumulated <br>points</th>
                <th scope="col py-auto my-auto">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                @foreach($user->events as $event)
                  @php
                    $donaciones = $event->donations;
                    $puntos = $event->points->sum('count');
                    $status = $event->constatus;
                    if($event->status < 3){
                      $link = url('/event') . '/' . $event->slug;
                    }else{
                      $link = url('admin/event') . '/' . $event->slug;
                    }
                    //$status = App\Models\Status::find($event->status + 1)->type;
                    $totalDon = 0;
                    $totalMoney = 0;
                    foreach ($donaciones as $donacion) {
                        $totalDon += $donacion->count;
                        $totalMoney += $donacion->money;
                    };
                    $totalShareds = isset($event->shareds->last()->count) ? $event->shareds->last()->count : 0;
                    $fechaActual = Carbon::now();
                    $fechaInicial = Carbon::parse($event->created_at);
                    $fechaFinal = Carbon::parse($event->created_at)->addDays($event->duration);
                    $diasTranscurridos = $fechaActual->diffInDays($fechaInicial);
                    // $time = $fechaActual->diffInDays($fechaFinal);
                    $time = $event->duration - $diasTranscurridos;
                    if($status === 'In_Process'){
                      $color = 'table-warning';
                    } else if ($status === 'Aproved'){
                      $color = 'table-success';
                    }else{
                      $color = 'table-danger';
                    }
                  @endphp
                  <tr>
                    <th scope="row">{{$loop->parent->index + 1}}</th>
                    <td>{{$user->name}}</td>
                    <td>${{$totalMoney}}</td>
                    <td class="{{$color}}">{{$status}}</td>
                    <td>
                      <a class="btn btn-warning" href="{{$link}}"target="_blank">See</a>
                    </td>
                    <td>{{$totalShareds}}</td>
                    <td>{{$time}}</td>
                    <td>{{$totalDon}}</td>
                    <td>{{$puntos}}</td>
                    <td>
                      <a type="button" class="btn btn-primary text-dark" wire:click="edit({{ $event->id }})">Edit</a>
                      <a type="button" class="btn btn-danger text-dark" wire:click="delete({{ $event->id }})">Delet</a>
                    </td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
          @if($isModalOpen)
            <div class="modal show d-block" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="closeModalPopover()"></button>
                  </div>
                  <div class="modal-body row">
                    <div class="mb-3 col-6">
                      <label for="duration" class="form-label">durations</label>
                      <input type="number" class="form-control" id="duration" aria-describedby="durationHelp" wire:model.defer='duration'>
                      <div id="durationHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-control" aria-describedby="duratonHelp" id="status" wire:model.defer='status'>
                        <option value="1">In_Process</option>
                        <option value="2">Aproved</option>
                        <option value="3">Fraud</option>
                        <option value="4">Deleted</option>
                        <option value="5">Finish</option>
                      </select>
                      <div id="duratonHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModalPopover()" >Close</button>
                    <button type="button" class="btn btn-primary" wire:click="store()">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          @endif

    </section>

</main><!-- End #main -->

