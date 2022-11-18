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
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row">
      <div class="col-lg-12">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usser</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
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
              <td>{{$user->paypal_email ? $user->paypal_email : 'not' }}</td>
              <td>
                <a type="button" class="btn btn-danger text-white" wire:click="delete({{ $user->id }})">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </section>
</main><!-- End #main -->