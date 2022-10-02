<div id="menuHeader">
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/CB Fundraising Logo Dorado.png') }}" alt="">
                <span class="d-none d-lg-block">CB Fundraising</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
        
          <ul class="d-flex align-items-center">
            <li class="nav-item dropdown" id="notifications">
              <a class="nav-link nav-icon" data-bs-toggle="dropdown" id="dnotifications">
                <i class="bi bi-bell"></i>
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
                <span class="badge bg-primary badge-number">{{$cantidadNoty}}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" aria-labelledby="dnotifications">
                <li class="dropdown-header">
                  You have {{$cantidadNoty}} new notifications
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
                  <div>
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
              </ul>
            </li>
            <li class="nav-item dropdown" id="messages">
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
              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="dmessages">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">{{$cantidadMensages}}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages" >                
                <li class="dropdown-header">
                  You have {{$cantidadMensages}} new messages
                  <a wire:click="sendAdmin()"><span class="badge rounded-pill bg-primary p-2 ms-2">Send CB-Fundraising</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                @forelse($mensajeUnique as $mensa)
                @if($loop->index < 4)
                  @php
                    $bgColor = '';
                    if($mensa->view == true){
                      $bgColor = 'background-color: #f6f9ff';
                    }
                    $action = false;
                    if(isset($mensa->remitter_id)){
                      $action = true;
                    }else{
                      $action = false;
                    }
                  @endphp
                  <li class="message-item text-center" style="{{$bgColor}}">
                    @if($action)
                      @if($mensa->Isorg == 1)
                        <a wire:click="abrirModal({{$mensa->remitter_id}})" class="text-center">
                          <div class="text-center mx-auto">
                            <h4>{{$mensa->name}}</h4>
                            <p>{{$mensa->body}}</p>
                            <p>{{$mensa->created_at}}</p>
                          </div>
                        </a>
                      @else
                        <a onclick="$('#mensajesModal').modal('hide'); mailtover({{$mensa->id}}, '{{ \Illuminate\Support\str::before($mensa->email, '@') }}', '{{ \Illuminate\Support\str::after($mensa->email, '@') }}');" type="button" class="text-center">
                          <div class="text-center mx-auto">
                            <h4>{{$mensa->name}}</h4>
                            <p>{{$mensa->body}}</p>
                            <p>{{$mensa->created_at}}</p>
                          </div>
                        </a>
                      @endif
                    @else
                    
                    <a onclick="mailtover({{$mensa->id}}, '{{ \Illuminate\Support\str::before($mensa->email, '@') }}', '{{ \Illuminate\Support\str::after($mensa->email, '@') }}')" type="button" class="text-center">
                      <div class="text-center mx-auto">
                        <h4>{{$mensa->name}}</h4>
                        <p>{{$mensa->body}}</p>
                        <p>{{$mensa->created_at}}</p>
                      </div>
                    </a>
                    @endif
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
                <li class="dropdown-footer">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#mensajesModal">Show all messages</a>
                </li>
              </ul>
            </li>
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
                </a>

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
                                <li>
                                  <h6 class="dropdown-header small text-muted">
                                      {{ __('Manage Account') }}
                                  </h6>                                  
                                </li>
                                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-jet-nav-link>
                                
                                <x-jet-nav-link class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                </x-jet-nav-link>
                                

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center px-4" href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                  <a class="dropdown-item d-flex align-items-center" href="{{ route('faq') }}">
                                    <span>Need Help</span>
                                  </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center px-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Log out') }}
                                    </a>
                                </li>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}" class="d-none">
                                    @csrf
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                    
                </ul>

            </li>
          </ul>
        </nav>

    </header>
    <x-nav-modales :notificaciones="$notificaciones" :mensajes="$mensajeUnique"/>
          
    @if($isModalOpen === 'go')
      <div x-init="$('#mensajesModal').modal('hide');" class="modal fade show" style="display: block;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Chat</h5>
              <button type="button" class="btn-close" aria-label="Close" wire:click="closeModalPopover()"></button>
            </div>
            <div class="modal-body container">
              <div class="card pt-3 pb-0 mb-0">
                <div id="chat" class="col-12 row card-body overflow-scroll pb-0" style="height: 240px;">
                @forelse($chat as $msj)
                  @if($msj->receiver_id === auth()->user()->id)
                  <div x-init="scrollDiv(); console.log('ya bajo');" class="col-12 d-flex justify-content-start">
                    <div class="w-75 alert alert-warning">
                      <p class="m-0 text-start">{{$msj->body}}</p>
                      <p class="m-0 text-start form-text">{{$msj->created_at}}</p>
                    </div>
                  </div>
                  @else
                  <div x-init="scrollDiv(); console.log('ya bajo');" class="col-12 d-flex justify-content-end">
                    <div class="w-75 alert alert-primary">
                      <p class="m-0 text-end">{{$msj->body}}</p>
                      <p class="m-0 text-end form-text">{{$msj->created_at}}</p>
                    </div>
                  </div>
                  @endif
                @empty
                  <div x-init="scrollDiv(); console.log('ya bajo');" class="col-12 d-flex justify-content-center">
                    <div class="w-75 alert alert-primary" style="height: 75px;">
                      <h1 class="m-0 text-canter">Chat Empty</h1>
                    </div>
                  </div>
                @endforelse
                </div>
              </div>
              <form class="row" wire:submit.prevent="send()">
                <div class="mb-3 col-12">
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
    @endif
</div>
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
          <div class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="120000000">
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
          <div class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="120000000">
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