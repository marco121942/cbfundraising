@section('title', 'Game')
@push('css')
  @if($ticket)
    <link href="{{ asset('assets/game') }}/game{{$ticket}}.css" rel="stylesheet">
  @else
    <link href="{{ asset('assets/game') }}/game2.css" rel="stylesheet">
  @endif
<link href="{{ asset('assets/css/front/event/style.css') }}" rel="stylesheet">
@endpush
<main wire:ignore class="mt-5 pt-5">
  @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
      <strong>{{ session('message') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <header class='text-header mt-5'>
    <div class="container text-center">
      <h1 class="text-white">Scratch and win</h1>
      <h5 class="text-white">Scratch the screen</h5>
    </div>
  </header> 
@if($ticket)
  <div class="container-fluid">
    <section class="section-img my-0 py-0">
      <!-- el elemento padre debe ser posicion relativa -->
      <div id="Scrach" style="position: relative; min-width: 350px;">
          @if($suerte)
          <img src="" class="user-select-none pe-none unselectable" data-src="{{ asset('assets/game/boletos') }}/Boleto{{$ticket}}$_Ganador.png" draggable="false;" (draggable)="false;" dragstart="false;" (dragstart)="false;" >
          @else
          <img src="" class="user-select-none pe-none unselectable" data-src="{{ asset('assets/game/boletos') }}/Boleto{{$ticket}}$_Perdedor.png" draggable="false;" (draggable)="false;" dragstart="false;" (dragstart)="false;" >
          @endif
      </div>
    </section>
    <div id="divListo" class="d-none container text-center py-5" >
      @if($suerte)
        <!--  -------------  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">you’re winner!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h1>Congratulations you’re winner!!!</h1>
                <h5>Check your email</h5>
                <x-shared-popover-button :evento="$evento" :normal=false :block=false class="col-sm-12"/>
                @if($this->continue)
                  <a href="{{ route('game') }}" class="btn boton col-sm-12 col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Continue</a>
                @else
                  <a href="{{ route('donate', ['event' => $eventSlug]) }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Donate</a>
                @endif
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- ---------- -->
        <h1 class="text-white">Congratulations you’re winner!!!</h1>
        <h5 class="text-white">Check your email</h5>
        <x-shared-popover-button :evento="$evento" :normal=false :block=false class=""/>
        @if($this->continue)
          <a href="{{ route('game') }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Continue</a>
        @else
          <a href="{{ route('donate', ['event' => $eventSlug]) }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Donate</a>
        @endif
      @else
        <!--  -------------  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">You won!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h1>Check your email</h1>
                <h5>for more details</h5>
                <x-shared-popover-button :evento="$evento" :normal=false :block=false  class="col-sm-12"/>
                @if($this->continue)
                  <a href="{{ route('game') }}" class="btn boton col-sm-12 col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Continue</a>
                @else
                  <a href="{{ route('donate', ['event' => $eventSlug]) }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Donate</a>
                @endif
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- ---------- -->
        <h1 class="text-white">You won!!!</h1>
        <h3 class="text-white">Check your email</h3>
        <h5 class="text-white">for more details</h5>
        <x-shared-popover-button :evento="$evento" :normal=false :block=false class="" />
        @if($this->continue)
          <a href="{{ route('game') }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Continue</a>
        @else
          <a href="{{ route('donate', ['event' => $eventSlug]) }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Donate</a>
        @endif
      @endif
    </div>
  </div>
@else
  <section class="section-img">
    <div class="container text-center text-white">
      <h1>Not Games</h1>
      <h1>We help without excuses</h1>
      <h5>Now it's your turn, donate and start helping</h5>
      <a href="{{ route('donate', ['event' => $eventSlug]) }}" class="btn boton col-md-3 text-center mx-auto mt-3 mt-sm-3 mt-md-0">Donate</a>
    </div>
  </section>
@endif
</main>

@push('js')
<script src="{{ asset('assets/game/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/principal-nuevo.js') }}"></script>
<script src="{{ asset('assets/game/p5.min.js') }}"></script>
<script src="{{ asset('assets/game/confetti.js') }}"></script>
  @if($ticket)
  <script src="{{ asset('assets/game') }}/game{{$ticket}}.js"></script>
  @endif
<script>
  $(document).on('dragstart', 'img', function(evt) {
    evt.preventDefault();
    return false;
  });
</script>
<script>
  
  let modalAbierto = false;
  var myModalEl = document.getElementById('exampleModal');
  var myModal = new bootstrap.Modal(myModalEl);

  function raspado(){
    let divListo = document.getElementById('divListo');
    divListo.classList.remove('d-none');
    Livewire.emit('raspado');
    celebrar();
  };

  function celebrar(){
    startConfetti();
    myModal.show();
    modalAbierto = true;
  };

  function otraCelebrada(){
    if (modalAbierto === false) {
      celebrar();
    };

  };

  myModalEl.addEventListener('hidden.bs.modal', function (event) {
    stopConfetti();
    modalAbierto = false;
  })

</script>

@endpush