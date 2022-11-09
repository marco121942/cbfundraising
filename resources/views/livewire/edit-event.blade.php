@section('title', 'Edit Event')
<main id="main" class="main">
  @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
      <strong>{{ session('message') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div class="pagetitle">
    <h1>Edit Event</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Event</li>
        <li class="breadcrumb-item active">Edit Event</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

      @if($evento)
        @if($evento->status < 3)
        <div class="card">
          <div class="card-body">
            <!-- General Form Elements -->
            <form wire:submit.prevent="save()" enctype="multipart/form-data">
              <h5 class="card-title">Edit Event (section 1 - Required)</h5>
              <div class="row mb-3">
                <label for="eventImage1" class="col-sm-2 col-form-label">Event image 1</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" wire:model.defer='eventImage1' multiple>
                  <p class="small text-muted py-0 my-0">Select 3 images file type: Png, Jpg, Jpeg, Svg o Gif, Preference's of: 1024px x 580px</p>
                  <!-- id="eventImage1" name="eventImage1" -->
                </div>
                <div wire:loading wire:target='eventImage1'>Uploading...</div>
                
                @error('eventImage1.*')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                @error('Imagen')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="title1">Tittle 1</label>
                <input type="text" class="form-control" wire:model.defer='title1' placeholder="title1" >
                <!-- id="title1" name="title1" -->
                @error('title1')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description1">Description 1</label>
                <textarea rows="3" class="form-control" wire:model.defer='description1' ></textarea>
                <!-- id="description1" name="description1"  -->
                @error('description1')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <h5 class="card-title">Edit Event (section 2 - Optional)</h5>

              <div class="form-group">
                <label for="title2">Tittle 2</label>
                <input type="text" class="form-control" wire:model.defer='title2' placeholder="title2">
                <!-- id="title2" name="title2"  -->
                @error('title2')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description2">Description 2</label>
                <textarea rows="3" class="form-control" wire:model.defer='description2'></textarea>
                <!-- id="description2" name="description2" -->
                @error('description2')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <h5 class="card-title">Edit Event (section 3 - Optional)</h5>

              <div class="form-group">
                <label for="title3">Tittle 3</label>
                <input type="text" class="form-control" wire:model.defer='title3' placeholder="title3">
                <!-- id="title3" name="title3" -->
                @error('title3')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description3">Description 3</label>
                <textarea rows="3" class="form-control" wire:model.defer='description3'></textarea>
                <!-- id="description3" name="description3" -->
                @error('description3')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <br>

              <div class="row mb-3">
                <div class="col-sm-12">
                  
                  @if(isset($evento))
                    <div class="card mb-4 py-0 text-center border" id="description">
                      <div class="card-body py-3">
                          <h6 class="h6 d-inline font-weight-bold">{{url('/event')}}/{{$evento->slug}}</h6>
                          <br class="d-sm-block d-md-none">
                          <a href="{{url('/event')}}/{{$evento->slug}}" target="_blank" class="btn btn-outline-warning round mx-3">Go Event</a>
                          @php
                          $eventShared = $evento;
                          @endphp
                          <x-shared-popover-button :evento="$eventShared"/>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-get-started" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Save event</button>
                  @else
                    <button type="submit" class="btn btn-get-started" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Create event</button>
                  @endif

                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>      
        @else
          <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4 py-0 text-center" id="description">
                  <div class="card-body py-3">
                      <h3 class="h2 d-inline text-danger">Event marked as {{$evento->constatus}}</h3>
                  </div>
                </div>
            </div>
          </div>
        @endif
      @else
        <div class="card">
          <div class="card-body">
            <!-- General Form Elements -->
            <form wire:submit.prevent="save()" enctype="multipart/form-data">
              <h5 class="card-title">Edit Event (section 1 - Required)</h5>
              <div class="row mb-3">
                <label for="eventImage1" class="col-sm-2 col-form-label">Event image 1</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" wire:model.defer='eventImage1' multiple>
                  <p class="small text-muted py-0 my-0">Select 3 images file type: Png, Jpg, Jpeg, Svg o Gif, Preference's of: 1024px x 580px</p>
                  <!-- id="eventImage1" name="eventImage1" -->
                </div>
                <div wire:loading wire:target='eventImage1'>Uploading...</div>
                
                @error('eventImage1.*')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                @error('Imagen')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="title1">Tittle 1</label>
                <input type="text" class="form-control" wire:model.defer='title1' placeholder="title1" >
                <!-- id="title1" name="title1" -->
                @error('title1')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description1">Description 1</label>
                <textarea rows="3" class="form-control" wire:model.defer='description1' ></textarea>
                <!-- id="description1" name="description1"  -->
                @error('description1')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <h5 class="card-title">Edit Event (section 2 - Optional)</h5>

              <div class="form-group">
                <label for="title2">Tittle 2</label>
                <input type="text" class="form-control" wire:model.defer='title2' placeholder="title2">
                <!-- id="title2" name="title2"  -->
                @error('title2')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description2">Description 2</label>
                <textarea rows="3" class="form-control" wire:model.defer='description2'></textarea>
                <!-- id="description2" name="description2" -->
                @error('description2')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <h5 class="card-title">Edit Event (section 3 - Optional)</h5>

              <div class="form-group">
                <label for="title3">Tittle 3</label>
                <input type="text" class="form-control" wire:model.defer='title3' placeholder="title3">
                <!-- id="title3" name="title3" -->
                @error('title3')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description3">Description 3</label>
                <textarea rows="3" class="form-control" wire:model.defer='description3'></textarea>
                <!-- id="description3" name="description3" -->
                @error('description3')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <br>

              <div class="row mb-3">
                <div class="col-sm-12">
                  
                  @if($evento)
                    <div class="card mb-4 py-0 text-center border" id="description">
                      <div class="card-body py-3">
                          <h6 class="h6 d-inline font-weight-bold">{{url('/event')}}/{{$evento->slug}}</h6>
                          <br class="d-sm-block d-md-none">
                          <a href="{{url('/event')}}/{{$evento->slug}}" target="_blank" class="btn btn-outline-warning round mx-3">Go Event</a>
                          <x-shared-popover-button :evento="$evento"/>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-get-started" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Save event</button>
                  @else
                    <button type="submit" class="btn btn-get-started" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Create event</button>
                  @endif

                  @if($evento)
                    <a href="https://api.whatsapp.com/send?text={{url('/l')}}/{{ Str::substr($evento->slug, -14) }}" target="_blank" id="logo" class="btn btn-outline-warning round mx-3">Shared</a>
                      <br>
                  @endif
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>
      @endif
      </div>
    </div>
  </section>

</main>

@push('js')
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
  </script>
  <script>
    // Si pulsamos tecla en un Input
   $("input").keydown(function (e){
     // Capturamos qué telca ha sido
     var keyCode= e.which;
     // Si la tecla es el Intro/Enter
     if (keyCode == 13){
       // Evitamos que se ejecute eventos
       event.preventDefault();
       // Devolvemos falso
       return false;
     }
   });
  </script>
    
@endpush