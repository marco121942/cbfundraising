@section('title', 'Stop Event')

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
        <li class="breadcrumb-item active">Stop event</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Usser</th>
                <th scope="col-md-5">Link</th>
                <th scope="col">Estatus</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                @foreach($user->events as $event)
                  @php
                    $link = url('/admin/event') . '/' . $event->slug;
                    $status = $event->constatus;
                    if($status === 'In_Process'){
                      $color = 'table-warning';
                    } else if ($status === 'Aproved'){
                      $color = 'table-success';
                    }else{
                      $color = 'table-danger';
                    }
                  @endphp
                  <tr>
                    <th scope="row col-md-3">{{$loop->parent->index + 1}}</th>
                    <td>{{$user->name}}</td>
                    <td >
                      <div class="input-group">
                        <input class="form-control" id="disabledInput" type="text" placeholder="{{$link}}" disabled>
                        <a type="button" class="btn btn-warning" href="{{$link}}"target="_blanck" >See</a>
                      </div>
                       
                    </td>
                    <td class="{{$color}} text-muted text-center fw-bolder">{{$status}}</td>
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" wire:click="restored({{ $event->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                <span>Restored Event</span>
                            </a>
                            <a class="dropdown-item" wire:click="delete({{ $event->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                <span>Deleted Event</span>
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
      </div>
    </div>
  </section>

</main><!-- End #main -->

