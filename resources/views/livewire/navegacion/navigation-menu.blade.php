<div>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/CB Fundraising Logo Dorado.png') }}" alt="">
                <span class="d-none d-lg-block">CB Fundraising</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

            <li class="nav-item dropdown" id="notifications">

              <a class="nav-link nav-icon" data-bs-toggle="dropdown" id="dnotifications">
                <i class="bi bi-bell"></i>
                @php
                  if(auth()->user()->hasRole('admin')){
                      $cantidad = $notificaciones->filter(function ($noty){
                          return $noty->deleted_receiver === 0;
                      })->count();
                  }else{
                      $cantidad = $notificaciones->filter(function ($noty){
                          return $noty->view === 0;
                      })->count();
                  }
                @endphp
                <span class="badge bg-primary badge-number">{{$cantidad}}</span>
              </a><!-- End Notification Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" aria-labelledby="dnotifications">
                <li class="dropdown-header">
                  You have {{$cantidad}} new notifications
                  <a wire:click="viewAll()"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                
                @forelse($notificaciones as $notify)
                  @if($loop->index < 4)
                  @php
                    $clases = '';
                    if($notify->success === 1){
                      $clases = 'bi bi-info-circle text-primary';
                    }else if($notify->success === 2){
                      $clases = 'bi bi-check-circle text-success';
                    }else if($notify->success === 3){
                      $clases = 'bi bi-exclamation-circle text-warning';
                    }else{
                      $clases = 'bi bi-x-circle text-danger';
                    };
                    $bgColor = '';
                    if(auth()->user()->hasRole('admin')){
                      if($notify->deleted_receiver === 1){
                        $bgColor = 'background-color: #f6f9ff';
                      }
                    }else{
                      if($notify->view === 1){
                        $bgColor = 'background-color: #f6f9ff';
                      }
                    }
                  @endphp

                <li class="notification-item" style="{{$bgColor}}">
                  <i class="{{$clases}}"></i>
                  <div >
                    
                    @if(auth()->user()->hasRole('admin'))
                      <h4 >
                      @isset($notify->event->user->name)
                        User {{$notify->event->user->name}},
                      @endisset
                        Event {{$notify->Consuccess}}
                      </h4>
                    @else
                      <h4 >Event {{$notify->Consuccess}}</h4>
                    @endif
                    
                    
                    @if(!$loop->index >= 1)
                      @isset($notify->event->title1)
                      <h6>{{$notify->event->title1}}</h6>
                      <p>{{$notify->event->description1}}</p>
                      @endisset
                    @endif
                    <p>{{$notify->created_at}}</p>
                  </div>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>
                  @else
                    @break
                  @endif
                @empty
                <li>
                  <hr class="dropdown-divider">
                </li>
                @endforelse
                              
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#notificacionesModal">Show all notifications</a>
                </li>

              </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown" >

              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="messages">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
              </a><!-- End Messages Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages" >
                <li class="dropdown-header">
                  You have 3 new messages
                  <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{ asset('assets/img/services/features-1.png') }}" alt="" class="rounded-circle">
                    <div>
                      <h4>Maria Hudson</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>4 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{ asset('assets/img/services/features-2.png') }}" alt="" class="rounded-circle">
                    <div>
                      <h4>Anna Nelson</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>6 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{ asset('assets/img/services/features-3.png') }}" alt="" class="rounded-circle">
                    <div>
                      <h4>David Muldon</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>8 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="dropdown-footer">
                  <a href="#">Show all messages</a>
                </li>

              </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->


            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    @else
                        <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    @endif
                </a><!-- End Profile Iamge Icon -->
                <!-- Teams Dropdown -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <x-jet-dropdown id="teamManagementDropdown">
                            <x-slot name="trigger">
                                {{ Auth::user()->currentTeam->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Team Management -->
                                <h6 class="dropdown-header">
                                    {{ __('Manage Team') }}
                                </h6>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <hr class="dropdown-divider">

                                <!-- Team Switcher -->
                                <h6 class="dropdown-header">
                                    {{ __('Switch Teams') }}
                                </h6>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach
                            </x-slot>
                        </x-jet-dropdown>
                    @endif

                    <!-- Settings Dropdown -->
                    @auth
                        <x-jet-dropdown id="settingsDropdown">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @else
                                    {{ Auth::user()->name }}

                                    <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <h6 class="dropdown-header small text-muted">
                                    {{ __('Manage Account') }}
                                </h6>
                                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-jet-nav-link>
                                <li>
                                    <x-jet-dropdown-link class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>
                                </li>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <x-jet-dropdown-link class="dropdown-item d-flex align-items-center" href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    </li>
                                @endif
                               <!-- Authentication -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                  <a class="dropdown-item d-flex align-items-center" href="{{ route('faq') }}">
                                    <!-- <i class="bi bi-question-circle"></i> -->
                                    <span>Need Help</span>
                                  </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <x-jet-dropdown-link class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Log out') }}
                                    </x-jet-dropdown-link>
                                </li>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

          </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->

    <!-- Modal -->
    <div class="modal fade" id="notificacionesModal" tabindex="-1" aria-labelledby="notificacionesModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="notificacionesModalLabel">Notifications</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <ul class="list-group">
                @forelse($notificaciones as $notify)
                @if($loop->index < 4)
                @php
                  $clases = '';
                  if($notify->success === 1){
                    $clases = 'bi bi-info-circle text-primary';
                  }else if($notify->success === 2){
                    $clases = 'bi bi-check-circle text-success';
                  }else if($notify->success === 3){
                    $clases = 'bi bi-exclamation-circle text-warning';
                  }else{
                    $clases = 'bi bi-x-circle text-danger';
                  };
                  $bgColor = '';
                  if(auth()->user()->hasRole('admin')){
                    if($notify->deleted_receiver === 1){
                      $bgColor = 'background-color: #f6f9ff';
                    }
                  }else{
                    if($notify->view === 1){
                      $bgColor = 'background-color: #f6f9ff';
                    }
                  }
                @endphp
                
                <li class="list-group-item list-group-flush" style="{{$bgColor}}">
                  <i class="d-inline-block {{$clases}}"></i>
                  <div class="d-inline-block">
                    @if(auth()->user()->hasRole('admin'))
                      <h4 class='d-inline-block'>
                      @isset($notify->event->user->name)
                        User {{$notify->event->user->name}},
                      @endisset
                        Event {{$notify->Consuccess}}
                      </h4>
                    @else
                      <h4 class='d-inline-block'>Event {{$notify->Consuccess}}</h4>
                    @endif
                    @if(!$loop->index >= 1)
                    @isset($notify->event->title1)
                    <h6 class="d-inline-block">{{$notify->event->title1}}</h6>
                    <p class="d-inline-block">{{$notify->event->description1}}</p>
                    @endif
                    @endif
                    <p class="d-inline-block">{{$notify->created_at}}</p>
                  </div>
                </li>

                <li class="list-group-item list-group-flush border-start-0 border-end-0">
                  <hr class="dropdown-divider">
                </li>
                @else
                @break
                @endif
                @empty
                <li>
                  <hr class="dropdown-divider">
                </li>
                @endforelse
                </ul>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


</div>

@push('js')
  <script>
    window.addEventListener('load', () => {
    
      Livewire.emit('notificacionesMenu');
      console.log('notificacionesMenu');
    
    });
  </script>
  <script>
    let toastsAbierto = false;

    function toast(mensaje, tipo, accion, fecha) {
      let momento = '';
      if (fecha) {
        momento = fecha;
      }else{
        momento = 'Just Now';
      }
      let color = '';
      if (tipo === 'Notification') {
        color = 'bg-primary';
      }else{
        color = 'bg-success';
      }
      let htmlMarkup;
      if (accion){
        htmlMarkup = `
          <div class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="120000">
              <div class="toast-header ${color} text-white">
                    <strong class="me-auto">${tipo}</strong>
                    <small>${momento}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                    X
                    </button>
              </div>
              <div class="toast-body text-center">
                  ${mensaje}
                  <br>
                  <a href="${accion}" class="btn-sm btn-get-started my-0 mx-auto py-1 px-2"> Go </a>
              </div>
          </div>
        `;
      }else{
        htmlMarkup = `
          <div class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="120000">
              <div class="toast-header ${color} text-white">
                    <strong class="me-auto">${tipo}</strong>
                    <small>${momento}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                    X
                    </button>
              </div>
              <div class="toast-body text-center">
                  ${mensaje}
              </div>
          </div>
        `;
        
      }
      var template = document.createElement('template');
      html = htmlMarkup.trim();
      template.innerHTML = html;
      return template.content.firstChild;
    }

    window.addEventListener('toasts', event => {
      abrirToasts(event.detail.mensaje, event.detail.tipo, event.detail.accion, event.detail.fecha);
      console.log('toasts');
    });
    
    function abrirToasts(mensaje, tipo, accion, fecha){
      var toastEl = toast(mensaje, tipo, accion, fecha);
      document.getElementById('container-toasts').appendChild(toastEl);
      let myToast = new bootstrap.Toast(toastEl);
      myToast.show();
      toastsAbierto = true;
    };
  </script>
@endpush