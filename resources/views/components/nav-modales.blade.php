@props(['notificaciones', 'mensajes'])
<div >
  <div id="notificacionesModal" tabindex="4000" aria-labelledby="notificacionesModalLabel" class="modal fade show" data-bs-backdrop="false" data-bs-keyboard="true" aria-hidden="false" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable modal-lg shadow">
      <div class="modal-content border shadow">
        <div class="modal-header">
          <h3 class="modal-title" id="notificacionesModalLabel">Notifications</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-light">
          <ul class="list-group">
          @forelse($notificaciones as $notify)
            
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
            
            <li class="list-group-item list-group-flush d-flex align-items-start {{$bgColor}}">
              <div class="me-1">
                <div class="avatar bg-light-success">
                  <div class="avatar-content fs-1">
                    <i class="{{$clases}}"></i>
                  </div>
                </div>
              </div>
              <div class="flex-grow-1">
                @if(auth()->user()->hasRole('admin'))
                  <h4 class='d-inline-block'>
                  @isset($notify->event->user->name)
                    User {{$notify->event->user->name}},
                  @endisset
                    Event {{$notify->Consuccess}}
                  </h4> | 
                @else
                  <h4 class='d-inline-block'>Event {{$notify->Consuccess}}</h4> | 
                @endif
                @if(!$loop->index >= 1)
                @isset($notify->event->title1)
                <h6 class="d-inline-block">{{$notify->event->title1}}</h6> | 
                <p class="d-inline-block">{{$notify->event->description1}}</p> | 
                @endisset
                @endif
                <p class="d-inline-block">{{$notify->created_at}}</p>
              </div>
            </li>

            <li class="list-group-item list-group-flush border-start-0 border-end-0 bg-light">
              <hr class="dropdown-divider">
            </li>
          @empty
            <li class="list-group-item list-group-flush border-start-0 border-end-0 bg-light">
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
  <div id="mensajesModal" tabindex="4000" aria-labelledby="mensajesModalLabel" class="modal fade show" data-bs-backdrop="false" data-bs-keyboard="true" aria-hidden="false" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable modal-lg shadow">
      <div class="modal-content border shadow">
        <div class="modal-header">
          <h3 class="modal-title" id="mensajesModalLabel">Message's</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-light">
            <ul class="list-group">
              @forelse($mensajes as $msj)
                @php
                  $bgColor = 'bg-light-primary';
                  $icono = 'bi bi-envelope-fill';
                  if($msj->view == true){
                    $bgColor = '';
                    $icono = 'bi bi-envelope-open-fill';
                  }
                  $action = false;
                  if(isset($msj->remitter_id)){
                    $action = true;
                  }else{
                    $action = false;
                  }
                @endphp 
              
              <li class="list-group-item list-group-flush d-flex align-items-start {{$bgColor}}">
                <div class="me-1">
                  <div class="avatar bg-light-success">
                      <div class="avatar-content fs-1">
                        <i class="{{$icono}}"></i>
                      </div>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h4 class='d-inline-block'>
                    User {{$msj->name}}
                  </h4> | 
                  <p class="d-inline-block">{{$msj->body}}</p> | 
                  <p class="d-inline-block">{{$msj->created_at}}</p> |
                  @if($action)
                    @if($msj->Isorg == 1)
                      <a wire:click="abrirModal({{$msj->remitter_id}})" class="btn btn-primary btn-sm">
                        Response
                      </a>
                    @else
                      <a onclick="$('#mensajesModal').modal('hide'); mailtover({{$msj->id}}, '{{ \Illuminate\Support\str::before($msj->email, '@') }}', '{{ \Illuminate\Support\str::after($msj->email, '@') }}');" type="button" class="btn btn-primary btn-sm">
                        Response
                      </a>
                    @endif
                  @else
                    <a onclick="$('#mensajesModal').modal('hide'); mailtover({{$msj->id}}, '{{ \Illuminate\Support\str::before($msj->email, '@') }}', '{{ \Illuminate\Support\str::after($msj->email, '@') }}');" type="button" class="btn btn-primary btn-sm">
                      Response
                    </a>
                  @endif

                </div>
              </li>

              <li class="list-group-item list-group-flush border-start-0 border-end-0 bg-light">
                <hr class="dropdown-divider">
              </li>
              
              @empty
              <li class="list-group-item list-group-flush border-start-0 border-end-0 bg-light">
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