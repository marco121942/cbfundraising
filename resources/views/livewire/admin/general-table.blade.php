@section('title', 'General Table')
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
        <li class="breadcrumb-item active">Administrators data</li>
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
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Link</th>
                <th scope="col">PayPal Email</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row col-md-3">{{$loop->index + 1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->address ? $user->address : 'not' }}</td>
                <td>{{$user->phone ? $user->phone : 'not' }}</td>
                <td>{{$user->email}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item btn btn-outline-success" href="mailto:{{$user->email}}" target="_blank"><small>Email</small></a>
                        <a class="dropdown-item btn btn-outline-primary" wire:click="$emit('openModalMsj', {{$user->id}} )"><small>Chat</small></a>
                    </div>
                  </div>
                </td>
                <td>{{$user->paypal_email ? $user->paypal_email : 'not' }}</td>
                <td>
                  <a type="button" class="btn btn-danger text-white" wire:click="delete({{ $user->id }})">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->