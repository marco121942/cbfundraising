<nav id="menuHeader" class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#" wire:ignore><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            @role('org')
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('dashboard') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard"><i class="ficon" data-feather="home"></i></a></li>
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('editevent') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Event"><i class="ficon" data-feather="calendar"></i></a></li>
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('generaltable') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Points"><i class="ficon" data-feather="check-square"></i></a></li>
            </ul>
            @endrole
            @role('admin')
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('adminDashboard') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard"><i class="ficon" data-feather="home"></i></a></li>
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('adminEventdata') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Events data"><i class="ficon text-primary" data-feather="calendar"></i></a></li>
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('adminStopevent') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Stop event"><i class="ficon text-danger" data-feather="calendar"></i></a></li>
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('adminGeneraltable') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="General Table"><i class="ficon text-primary" data-feather="user-check"></i></a></li>
                <li class="nav-item d-sm-none d-md-block"><a wire:ignore class="nav-link" href="{{ route('adminPartnertable') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Partner Table"><i class="ficon text-success" data-feather="user-check"></i></a></li>
            </ul>
            @endrole
        </div>
        
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style" wire:ignore><i class="ficon" data-feather="sun"></i></a></li>
            <li class="nav-item dropdown dropdown-notification me-25">
              @php
                $mensajesTrabajar = $messages
                ->filter(function ($mensa){
                    return $mensa->receiver_id == Auth::user()->id;
                });

                $cantidadMensages = $mensajesTrabajar->filter(function ($mensa){
                    return $mensa->view == false;
                })->count();

                $mensajeUnique = $mensajesTrabajar->unique('remitter_id');
              @endphp
              <a class="nav-link fs-2" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-envelope"></i>
                <span class="badge rounded-pill bg-primary badge-up">{{$cantidadMensages}}</span>
              </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mt-1 mb-0 me-auto">Messages</h4>
                            <div class="badge rounded-pill badge-light-warning p-1">{{$cantidadMensages}} New</div>
                            <a wire:click="sendAdmin()"><span class="badge rounded-pill badge-light-primary p-1">Send CB-Fundraising</span></a>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                    @forelse($mensajeUnique as $mensa)
                    @if($loop->index < 4)
                      @php
                        $bgColor = 'bg-light-primary';
                        $icono = 'bi bi-envelope-fill';
                        if($mensa->view == true){
                          $bgColor = '';
                          $icono = 'bi bi-envelope-open-fill';
                        }
                        $action = false;
                        if(isset($mensa->remitter_id)){
                          $action = true;
                        }else{
                          $action = false;
                        }
                      @endphp                      
                        @if($action)
                          @if($mensa->Isorg == 1)
                            <a wire:click="abrirModal({{$mensa->remitter_id}})" class="d-flex {{$bgColor}}">
                              <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content fs-1">
                                          <i class="{{$icono}}"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                  <p class="media-heading mb-1">
                                      <span class="fw-bolder text-center mb-1">{{$mensa->name}}</span><br>{{$mensa->body}}
                                  </p>
                                  <small class="notification-text text-end">{{$mensa->created_at}}
                                  </small>
                                </div>
                              </div>
                            </a>
                          @else
                            <a onclick="$('#mensajesModal').modal('hide'); mailtover({{$mensa->id}}, '{{ \Illuminate\Support\str::before($mensa->email, '@') }}', '{{ \Illuminate\Support\str::after($mensa->email, '@') }}');" type="button" class="d-flex {{$bgColor}}">
                              <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content fs-1">
                                          <i class="{{$icono}}"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                  <p class="media-heading mb-1">
                                      <span class="fw-bolder text-center mb-1">{{$mensa->name}}</span><br>{{$mensa->body}}
                                  </p>
                                  <small class="notification-text text-end">{{$mensa->created_at}}
                                  </small>
                                </div>
                              </div>
                            </a>
                          @endif
                        @else
                        <a onclick="mailtover({{$mensa->id}}, '{{ \Illuminate\Support\str::before($mensa->email, '@') }}', '{{ \Illuminate\Support\str::after($mensa->email, '@') }}')" type="button" class="d-flex {{$bgColor}}">
                          <div class="list-item d-flex align-items-start">
                            <div class="me-1">
                                <div class="avatar bg-light-success">
                                    <div class="avatar-content fs-1">
                                      <i class="{{$icono}}"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-body flex-grow-1">
                              <p class="media-heading mb-1">
                                  <span class="fw-bolder text-center mb-1">{{$mensa->name}}</span><br>{{$mensa->body}}
                              </p>
                              <small class="notification-text text-end">{{$mensa->created_at}}
                              </small>
                            </div>
                          </div>
                        </a>
                        @endif
                    @else
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      @break
                    @endif
                    @empty
                    @endforelse
                    </li>
                    <li class="dropdown-menu-footer">
                      <a class="btn btn-primary w-100" href="#" data-bs-toggle="modal" data-bs-target="#mensajesModal">Show all messages</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-notification me-25">
              @php
                if(auth()->user()->hasRole('admin')){
                    $cantidadNoty = $notificaciones->filter(function ($noty){
                        return $noty->deleted_receiver === 0;
                    })->count();
                }else{
                    $cantidadNoty = $notificaciones->filter(function ($noty){
                        return $noty->view == false;
                    })->count();
                }
              @endphp
              <a class="nav-link fs-2" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge rounded-pill bg-danger badge-up">{{$cantidadNoty}}</span>
              </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mt-1 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary p-1">{{$cantidadNoty}} New</div>
                            <a wire:click="viewAll()"><span class="badge rounded-pill badge-light-warning p-1">View all</span></a>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
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
                            $bgColor = 'bg-light-primary';
                            if(auth()->user()->hasRole('admin')){
                              if($notify->deleted_receiver === 1){
                                $bgColor = '';
                              }
                            }else{
                              if($notify->view === 1){
                                $bgColor = '';
                              }
                            }
                          @endphp
                          <a class="d-flex {{$bgColor}}" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                  <div class="avatar bg-light-success">
                                      <div class="avatar-content fs-1">
                                        <i class="{{$clases}}"></i>
                                      </div>
                                  </div>
                                </div>
                                
                                <div class="list-item-body flex-grow-1">
                                  <p class="media-heading">
                                    @if(auth()->user()->hasRole('admin'))
                                      @isset($notify->event->user->name)
                                        <span class="fw-bolder">
                                        User {{$notify->event->user->name}},
                                        </span>
                                      @endisset
                                        <span class="fw-bolder">
                                        Event {{$notify->Consuccess}}
                                        </span>
                                    @else
                                      
                                        <span class="fw-bolder">
                                          Event {{$notify->Consuccess}}
                                        </span>
                                      
                                    @endif
                                    <br>
                                    @if(!$loop->index >= 1)
                                      @isset($notify->event->title1)
                                      
                                        <span class="fw-bolder">
                                          {{$notify->event->title1}}
                                        </span>
                                        {{$notify->event->description1}}
                                      @endisset
                                    @endif
                                  </p><br>
                                    <small class="notification-text">{{$notify->created_at}}</small>
                                </div>
                            </div>
                          </a>
                        @else
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          @break
                        @endif
                      @empty
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      @endforelse
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100"  href="#" data-bs-toggle="modal" data-bs-target="#notificacionesModal">Read all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                    <div class="user-nav d-sm-flex d-none">
                      <span class="d-none d-md-block user-name fw-bolder">{{ Auth::user()->name }}</span>
                      @role('admin')
                      <span class="user-status">Admin</span>
                      @endrole
                      @role('org')
                      <span class="user-status">Org</span>
                      @endrole
                    </div>
                    <span class="avatar">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="round" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    @else
                        <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    @endif
                      <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                  {{--
                  @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>
                        <x-slot name="content">
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                  @endif
                  --}}
                  @auth
                      <div class="dropdown-header">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @else
                            {{ Auth::user()->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        @endif
                      </div>
                      
                      <h6 class="dropdown-header small text-muted">
                          {{ __('Manage Account') }}
                      </h6>                                  
                    
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                          {{ __('Dashboard') }}
                      </a>
                      
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                              {{ __('Profile') }}
                      </a>
                      

                      @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
              
                      <hr class="dropdown-divider">
              
              
                      <a class="dropdown-item d-flex align-items-center px-4" href="{{ route('api-tokens.index') }}">
                          {{ __('API Tokens') }}
                      </a>
              
                      @endif
                      
                      <hr class="dropdown-divider">
                      
                      
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('faq') }}">
                        <span>Need Help</span>
                      </a>
                      
                      
                      <hr class="dropdown-divider">
                      

                      
                      <a class="dropdown-item d-flex align-items-center px-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          {{ __('Log out') }}
                      </a>
                      
                      <form method="POST" id="logout-form" action="{{ route('logout') }}" class="d-none">
                          @csrf
                      </form>
                            
                    @endauth
                </div>
            </li>
        </ul>
    </div>
    <x-nav-modales :notificaciones="$notificaciones" :mensajes="$mensajeUnique"/>   
    @if($isModalOpen === 'go')
      <div x-init="$('#mensajesModal').modal('hide');" class="modal fade show" style="display: block;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg shadow-lg">
          <div class="modal-content border shadow">
            <div class="modal-header">
              <h5 class="modal-title">Chat</h5>
              <button type="button" class="btn-close" aria-label="Close" wire:click="closeModalPopover()"></button>
            </div>
            <div class="modal-body bg-light">
              <div class="chat-application">
                <div class="content-area-wrapper container-xxl p-0">
                
                  <div class="content-wrapper container-xxl p-0">
                    <div class="content-body">
                
                      <!-- Main chat area -->
                      <section class="chat-app-window">
                        <div class="active-chat">
                          <div class="user-chats overflow-scroll p-2" style="height: 250px" id="chat">
                            <div class="chats">
                              @forelse($chat as $msj)
                                @if($msj->receiver_id === auth()->user()->id)
                                <div x-init="scrollDiv(); console.log('ya bajo');" class="chat chat-left">
                                  <div class="chat-avatar">
                                    <div class="avatar box-shadow-1 cursor-pointer bg-light-danger">
                                        <div class="avatar-content fs-1">
                                          <i class="bi bi-chat-left-text"></i>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="chat-body">
                                    <div class="chat-content">
                                      <p class="m-0 text-start">{{$msj->body}}</p>
                                      <p class="m-0 text-start form-text">{{$msj->created_at}}</p>
                                    </div>
                                  </div>
                                </div>
                                @else
                                <div x-init="scrollDiv(); console.log('ya bajo');" class="chat">
                                  <div class="chat-avatar">
                                    <div class="avatar box-shadow-1 cursor-pointer bg-light-primary">
                                      <div class="avatar-content fs-1">
                                        <i class="bi bi-chat-right-text"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="chat-body">
                                      <div class="chat-content">
                                        <p class="m-0 text-end">{{$msj->body}}</p>
                                        <p class="m-0 text-end form-text">{{$msj->created_at}}</p>
                                      </div>
                                  </div>
                                </div>
                                @endif
                              @empty
                              <div x-init="scrollDiv(); console.log('ya bajo');" class="start-chat-area p-2">
                                <div class="mb-1 start-chat-icon">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>
                                <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                              </div>
                              @endforelse
                            </div>
                          </div>
                        </div>
                      </section>
                      <form class="chat-app-form" wire:submit.prevent="send()">
                        <div class="col-12">
                          <label for="body" class="form-label">Response</label>
                          <textarea class="form-control" name="body" id="body" rows="3" wire:model.defer='body' aria-describedby="bodyHelp"></textarea>
                          <div id="bodyHelp" class="form-text">Enter the Response's Information's.</div>
                        </div>
                        <div class="modal-footer pt-2 pb-0">
                          <button type="submit" wire:loading.class="disabled" wire:loading.attr="disabled" class="btn btn-primary col-6 col-md-4 mx-auto">Send</button>
                          <button type="button" class="btn btn-secondary" wire:click="closeModalPopover()" >Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    @endif
</nav>


@push('js')
  <script>
    window.addEventListener('load', () => {
    
      Livewire.emit('notificacionesMenu');
      console.log('notificacionesMenu');

    });
    function scrollDiv(){     
        var div = document.getElementById('chat');
        div.scrollTop = '9999';     
    }
    function mailtover(idSale, correo, mail){
      var correoMail = correo+'@'+mail;
      var sale = [idSale];
      @this.msjVer(sale);
      window.location.href = "mailto:"+correoMail;
      console.log('se cambio a visto el chat: '+sale+' y se paso el mailto: '+correoMail);
    }
    function modalver(idmodal){
      @this.abrirModal(idmodal);
      console.log('se abrira el chat: '+idmodal);
    }
    setInterval('contador()',120000);
    function contador(){
      @this.reiniciar();
      setInterval('contador()',120000);
    }
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
                  <a ${accion} class="btn-sm btn-get-started my-0 mx-auto py-1 px-2"> Go </a>
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