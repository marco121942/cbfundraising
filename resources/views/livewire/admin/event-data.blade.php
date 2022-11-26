@section('title', 'Event Data')
<main id="main" class="main">
  @if (session()->has('message'))
  <div class="position-relative">
    <div class="alert alert-success alert-dismissible fade show position-fixed end-0 mr-5 p-1" role="alert" style="z-index: 2000">
      <strong class="mr-4">{{ session('message') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
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

    <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr class="">
                  <th scope="col">#</th>
                  <th scope="col">Usser</th>
                  <th scope="col">Fundrising</th>
                  <th scope="col">Estatus</th>
                  <th scope="col">Link</th>
                  <th scope="col">Shared</th>
                  <th scope="col">Time <br>remaining<br> (days)</th>
                  <th scope="col">Donors</th>
                  <th scope="col">Acumulated <br>points</th>
                  <th scope="col">Actions</th>
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
                      <td class="{{$color}} text-muted text-center fw-bolder">{{$status}}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item btn btn-outline-warning" href="{{$link}}" target="_blank"><small>See</small></a>
                              <a class="dropdown-item btn btn-outline-success" href="mailto:{{$user->email}}" target="_blank"><small>Email</small></a>
                              <a class="dropdown-item btn btn-outline-primary" wire:click="$emit('openModalMsj', {{$user->id}} )"><small>Chat</small></a>
                          </div>
                        </div>
                      </td>
                      <td>{{$totalShareds}}</td>
                      <td>{{$time}}</td>
                      <td>{{$totalDon}}</td>
                      <td>{{$puntos}}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" wire:click="edit({{ $event->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                <span>Edit</span>
                            </a>
                            <a class="dropdown-item" wire:click="delete({{ $event->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                <span>Stop Event</span>
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
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

