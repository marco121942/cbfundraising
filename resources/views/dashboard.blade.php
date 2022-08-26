@section('title', 'Dashboard')
<main id="main" class="main">
  
  <div class="pagetitle px-1">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="col-md-12 mx-3 my-3">
    <h3 class="h3 my-2">
        Welcome to CB Fundraising
        @role('admin')
        {{Auth::user()->name}} From here, as an administrator you can manage the entire app, Good luck!
        @endrole
        @role('org')
        {{Auth::user()->name}} from here you can manage your event.
        @endrole
    </h3>
  </div>
  @if($evento)
  @if($evento->status < 3)
  <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-md-6 col-lg-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Shared<span> | Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-share-fill"></i>
                      </div>
                      <div class="ps-3">
                          <!-- <h6>26,545</h6> -->
                          <h6>{{$shareds}}</h6>
                          <span class="text-success small pt-1 fw-bold">{{round($porcentajeShareds)}}%</span> <span class="text-muted small pt-2 ps-1">increase (Daily)</span>

                      </div>
                  </div>
                </div>
              </div>

            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-md-6 col-lg-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Time Remaining | (days)</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hourglass-split"></i>
                      </div>
                      <div class="ps-3">
                          <!-- <h6>26,545</h6> -->
                          <h6>{{$time}} Days</h6>
                          <span class="text-muted small pt-2 ps-1">increase (Daily)</span>

                      </div>
                  </div>
                </div>
              </div>

            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-md-6 col-lg-4">
                <div class="card info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Raised<span> | Global in real time</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                          </svg>
                        </i>
                      </div>
                        <div class="ps-3">
                            <!-- <h6>$300,264.56</h6> -->
                            <h6>${{$raised}}</h6>
                            <span class="text-success small pt-1 fw-bold">{{round($porcentajeRaised)}}%</span> <span class="text-muted small pt-2 ps-1">increase (Daily)</span>

                        </div>
                    </div>
                  </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-md-6 col-lg-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Donors<span> | Today</span></h5>

                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-check-fill"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{$donors}}</h6>
                          <span class="text-success small pt-1 fw-bold">{{round($porcentajeDonors)}}%</span> <span class="text-muted small pt-2 ps-1">increase (Daily)</span>

                      </div>
                  </div>
                </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-md-6 col-lg-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Points<span> | Today</span></h5>

                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-upload"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{$puntos}}</h6>
                          <span class="text-success small pt-1 fw-bold">
                            <a href="{{route('generaltable')}}">See</a>
                          </span><span class="text-muted small pt-2 ps-1">increase (per Donors)</span>

                      </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

          </div>
        </div><!-- End News & Updates -->

        <div class="col-sm-12">
            
            <div class="card mb-4 py-0 text-center border" id="description">
              <div class="card-body py-3">
                  <h6 class="h6 d-inline font-weight-bold">{{url('/event')}}/{{$evento->slug}}</h6>
                  <a href="{{url('/event')}}/{{$evento->slug}}" target="_blank" class="btn-sm btn-get-started my-0 mx-3">Go Event</a>
                  <x-shared-popover-button :evento="$evento"/>
                  <a wire:click='borrar()' class="btn-sm btn-get-started my-0 mx-3">Borrar</a>
              </div>
            </div>

        </div>
      </div><!-- End Right side columns -->
  </section>
  @else
  <section class="section dashboard">
      <div class="row">

        <div class="col-sm-12">
            <div class="card mb-4 py-0 text-center" id="description">
              <div class="card-body py-3">
                @if( isset($evento) )
                  <h3 class="h2 d-inline text-danger">Event marked as {{$evento->constatus}}</h3>
                @endif
              </div>
            </div>
        </div>
      </div>
  </section>
  @endif
  @else
  <section class="section dashboard">
      <div class="row">

        <div class="col-sm-12">
            <div class="card mb-4 py-0 text-center" id="description">
              <div class="card-body py-3">
                  <h3 class="h5 d-inline">Create an event to start the fundraiser</h3>
                  <a href="{{ route('editevent') }}" class="btn-sm btn-get-started my-0 mx-3">Go Event Created</a>
              </div>
            </div>
        </div>
      </div>
  </section>
  @endif
</main>

@push('js')

  <script>
    window.addEventListener('load', () => {
      Livewire.emit('notificaciones');
    });
  </script>  
@endpush
