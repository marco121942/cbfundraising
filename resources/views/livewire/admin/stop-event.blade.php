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
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                @foreach($user->events as $event)
                  @php
                    $link = url('/admin/event') . '/' . $event->slug;
                  @endphp
                  <tr>
                    <th scope="row col-md-3">{{$loop->parent->index + 1}}</th>
                    <td>{{$user->name}}</td>
                    <td class="">
                        <input class="form-control mx-auto d-inline w-75" id="disabledInput" type="text" placeholder="{{$link}}" disabled>
                        <a type="button" class="btn btn-warning mx-auto d-inline w-25" href="{{$link}}"target="_blanck" >See</a>
                       
                    </td>
                    <td>
                        <a type="button" class="btn btn-danger text-dark" wire:click="delete({{ $event->id }})">Stop event</a>
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

