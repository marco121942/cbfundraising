@section('title', 'Edit Event')
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
            <!-- <form wire:submit.prevent="save()" enctype="multipart/form-data"> -->
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
              @csrf
              <h5 class="card-title">Edit Event (section 1 - Required)</h5>
              <div class="row mb-3">
                <label for="eventImage1" class="col-sm-2 col-form-label">Event image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" accept="image/*,.heic,.heif" id='eventImage1' name='eventImage1[]' multiple=''>
                  <p class="small text-muted py-0 my-0">Select 3 images file type: Png, Jpg, Jpeg, Svg o Gif, Preference's of: 1024px x 580px</p>
                  <!-- id="eventImage1" name="eventImage1" -->
                </div>
                <!-- <div wire:loading wire:target='eventImage1'>Uploading...</div> -->
                
                @error('Image')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                @error('Image 1')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>Image 2: {{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                @error('Image 2')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>Image 3: {{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                <div id="spinner" class="d-none text-center mt-2 mb-0">
                  <h5 class="card-title">loading image...</h5>
                  <div class="spinner-border" role="status">
                      <span class="visually-hidden">loading image...</span>
                  </div>
                </div>
                <div id="preview" class="row match-height mt-2"></div>
              </div>

              <div class="form-group">
                <label for="title1">Tittle 1</label>
                <input type="text" class="form-control" id='title1' name='title1' placeholder="title1" value="{{$title1}}">
                <!-- id="title1" name="title1" -->
                @error('title1')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description1">Description 1</label>
                <textarea rows="3" class="form-control" id='description1' name='description1' value="{{$description1}}" ></textarea>
                <!-- id="description1" name="description1"  -->
                @error('description1')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <h5 class="card-title">Edit Event (section 2 - Optional)</h5>

              <div class="form-group">
                <label for="title2">Tittle 2</label>
                <input type="text" class="form-control" id='title2' name='title2' placeholder="title2" value="{{$title2}}">
                
                @error('title2')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description2">Description 2</label>
                <textarea rows="3" class="form-control" id='description2' name='description2' value="description2"></textarea>
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
                <input type="text" class="form-control" id='title3' name='title3' placeholder="title3" value="{{$title3}}" >
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
                <textarea rows="3" class="form-control" id='description3' name='description3' value="description3" ></textarea>
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
                    <!-- <button type="submit" class="btn btn-warning waves-effect waves-float waves-light" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Save event</button> -->
                    <button type="submit" class="btn btn-warning waves-effect waves-float waves-light" >Save event</button>
                  @else
                    <!-- <button type="submit" class="btn btn-warning waves-effect waves-float waves-light" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Create event</button> -->
                    <button type="submit" class="btn btn-warning waves-effect waves-float waves-light" >Create event</button>
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
            <!-- <form wire:submit.prevent="save()" enctype="multipart/form-data"> -->
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
              @csrf
              <h5 class="card-title">Edit Event (section 1 - Required)</h5>
              <div class="row mb-3">
                <label for="eventImage1" class="col-sm-2 col-form-label">Event image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" accept="image/*,.heic,.heif" id='eventImage1' name='eventImage1[]' multiple=''>
                  <p class="small text-muted py-0 my-0">Select 3 images file type: Png, Jpg, Jpeg, Svg o Gif, Preference's of: 1024px x 580px</p>
                  <!-- id="eventImage1" name="eventImage1" -->
                </div>
                <!-- <div wire:loading wire:target='eventImage1'>Uploading...</div> -->
                
                @error('Image')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                @error('Image 1')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>Image 2: {{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                @error('Image 2')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>Image 3: {{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                <div id="spinner" class="d-none text-center mt-2 mb-0">
                  <h5 class="card-title">loading image...</h5>
                  <div class="spinner-border" role="status">
                      <span class="visually-hidden">loading image...</span>
                  </div>
                </div>
                <div id="preview" class="row match-height mt-2"></div>
              </div>

              <div class="form-group">
                <label for="title1">Tittle 1</label>
                <input type="text" class="form-control" id='title1' name='title1' placeholder="title1" value="{{$title1}}">
                <!-- id="title1" name="title1" -->
                @error('title1')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description1">Description 1</label>
                <textarea rows="3" class="form-control" id='description1' name='description1' value="{{$description1}}" ></textarea>
                <!-- id="description1" name="description1"  -->
                @error('description1')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <h5 class="card-title">Edit Event (section 2 - Optional)</h5>

              <div class="form-group">
                <label for="title2">Tittle 2</label>
                <input type="text" class="form-control" id='title2' name='title2' placeholder="title2" value="{{$title2}}">
                
                @error('title2')
                  <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="description2">Description 2</label>
                <textarea rows="3" class="form-control" id='description2' name='description2' value="description2"></textarea>
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
                <input type="text" class="form-control" id='title3' name='title3' placeholder="title3" value="{{$title3}}" >
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
                <textarea rows="3" class="form-control" id='description3' name='description3' value="description3" ></textarea>
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
                    <!-- <button type="submit" class="btn btn-warning waves-effect waves-float waves-light" wire:loading.class="disabled" wire:loading.attr="disabled" wire:target='eventImage1' >Save event</button> -->
                    <button type="submit" class="btn btn-warning waves-effect waves-float waves-light" >Save event</button>
                  @else
                    <button type="submit" class="btn btn-warning waves-effect waves-float waves-light">Create event</button>
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
  <script src="{{ asset('assets/js/back/heic2any.min.js') }}"></script>
  <script src="{{ asset('assets/js/back/screw-filereader.min.js') }}"></script>
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
  <script>

    let sistemFile = null;
    function isHEIC(file) {
        let x = file.type ? file.type.split('image/').pop() : file.name.split('.').pop().toLowerCase();
        return x == 'heic' || x == 'heif';
    }

    async function convertHEIC(file) {
      if (!isHEIC(file)){
        return file;
      }else{
        let blobURL = URL.createObjectURL(file);
        let blobRes = await fetch(blobURL);
        let blob = await blobRes.blob();
        let conversionResult = await heic2any({ blob });

        return conversionResult;
      } 
    }

    function FileListItem(a) {
      a = [].slice.call(Array.isArray(a) ? a : arguments);
      for (var c, b = c = a.length, d = !0; b-- && d;) d = a[b] instanceof File;
      if (!d) throw new TypeError("expected argument to FileList is File or array of File objects");
      for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(a[c]);
      return b.files;
    }

    function borrar(idImg){
      const spinner = document.getElementById('spinner');
      const output = document.getElementById('preview');
      spinner.classList.remove("d-none");
      output.classList.add("d-none");
      output.innerHTML = '';

      let result = [];
      let i = 1;
      console.log('length de files: '+sistemFile.length);
      for (var j = sistemFile.length - 1; j >= 0 ; j--) {
        const filete = sistemFile[j];
        console.log(filete);
        if(filete.name !== idImg){
          const url = URL.createObjectURL(filete);
          const newElement = document.createElement("div");
          newElement.classList.add("col-12");
          if(i !== 3){
            newElement.classList.add("col-md-6");
          }else{
            newElement.classList.add("col-md-12");
          }
          newElement.classList.add("col-lg-4");
          newElement.classList.add("mx-auto");
          newElement.innerHTML = `<div class="card">
                                    <div class="card-img-top img-fluid" style="background-image: url(${url});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;height:300px;">
                                    </div>
                                    <div class="card-body bg-light text-center">
                                      <a href="#" onclick="girar('${filete.name}')" class="btn btn-outline-primary waves-effect">Girar</a>
                                      <a href="#" onclick="borrar('${filete.name}')" class="btn btn-outline-primary waves-effect">Eliminar</a>
                                      <h3 class="text-muted">Event Image ${i}</h3>
                                    </div>
                                  </div>`;
          
          output.appendChild(newElement);
          result.push(filete);
          i++;
        };
      };
      const fileList = new FileListItem(result);
      if (fileList.length > 3) {fileList.length = 3;};
      
      eventImage1.files = null;
      eventImage1.files = fileList;

      sistemFile = null;
      sistemFile = fileList;

      console.log(sistemFile);
      console.log(eventImage1.files);
      
      spinner.classList.add("d-none");
      output.classList.remove("d-none");
    };

    async function girar(idImg){
      const spinner = document.getElementById('spinner');
      const output = document.getElementById('preview');
      spinner.classList.remove("d-none");
      output.classList.add("d-none");
      output.innerHTML = '';

      let resultado = [];
      let k = 1;
      console.log('length de files: '+sistemFile.length);
      for (var q = sistemFile.length - 1; q >= 0 ; q--) {
        const filete = sistemFile[q];
        if(filete.name !== idImg){
          const url = URL.createObjectURL(filete);
          const newElement = document.createElement("div");
          newElement.classList.add("col-12");
          if(k !== 3){
            newElement.classList.add("col-md-6");
          }else{
            newElement.classList.add("col-md-12");
          }
          newElement.classList.add("col-lg-4");
          newElement.classList.add("mx-auto");
          newElement.innerHTML = `<div class="card">
                                    <div class="card-img-top img-fluid" style="background-image: url(${url});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;height:300px;">
                                    </div>
                                    <div class="card-body bg-light text-center">
                                      <a href="#" onclick="girar('${filete.name}')" class="btn btn-outline-primary waves-effect">Girar</a>
                                      <a href="#" onclick="borrar('${filete.name}')" class="btn btn-outline-primary waves-effect">Eliminar</a>
                                      <h3 class="text-muted">Event Image ${k}</h3>
                                    </div>
                                  </div>`;
          
          output.appendChild(newElement);
          resultado.push(filete);
          k++;
        }else{
          async function girarAsincrona (fileteando) {
            const canvas = await document.createElement('canvas');
            const ctx = await  canvas.getContext('2d');
            const nameFilete = fileteando.name;

            const img = await fileteando.image();

            // calculate new size
            const widthImg = await img.width;
            const heightImg = await img.height;
            // const width = 1024;
            // const height = 540;
            // let width = 1024;
            // let height = 540;
            // if (widthImg > heightImg) {
              width = heightImg;
              height = widthImg;
            // } else {
            //   width = widthImg;
            //   height = heightImg;
            // };

            console.log('width');
            console.log(width);
            console.log('height');
            console.log(height);

            // resize the canvas to the new dimensions
            canvas.width = width;
            canvas.height = height;

            await ctx.translate(width / 2, height / 2);

            await ctx.rotate(Math.PI / 180 * -90); //Math.PI/180 * 5

            // scale & draw the image onto the canvas
            await ctx.drawImage(img, -img.width/2, -img.height/2, widthImg, heightImg); //, width, height
            
            // Get the binary (aka blob)
            const blob = await new Promise(rs => canvas.toBlob(rs, 1));
            // const blob = new Promise(rs => canvas.toBlob(rs, 1));
            const resizedFile = await new File([blob], nameFilete, fileteando);
            console.log('resizedFile');
            console.log(resizedFile);
            
            const url = await  URL.createObjectURL(resizedFile);
            const newElement = await document.createElement("div");
            newElement.classList.add("col-12");
          if(k !== 3){
            newElement.classList.add("col-md-6");
          }else{
            newElement.classList.add("col-md-12");
          }
          newElement.classList.add("col-lg-4");
          newElement.classList.add("mx-auto");
            newElement.innerHTML = `<div class="card">
                                      <div class="card-img-top img-fluid" style="background-image: url(${url});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;height:300px;">
                                      </div>
                                      <div class="card-body bg-light text-center">
                                        <a href="#" onclick="girar('${nameFilete}')" class="btn btn-outline-primary waves-effect">Girar</a>
                                        <a href="#" onclick="borrar('${nameFilete}')" class="btn btn-outline-primary waves-effect">Eliminar</a>
                                        <h3 class="text-muted">Event Image ${k}</h3>
                                      </div>
                                    </div>`;
            
            await output.appendChild(newElement);
            await resultado.push(resizedFile);
          };

          await girarAsincrona(filete)
          
          k++;
        };
      };
      const fileList = await new FileListItem(resultado);
      if (fileList.length > 3) {fileList.length = 3;};
      
      eventImage1.files = null;
      eventImage1.files = fileList;

      sistemFile = null;
      sistemFile = fileList;

      console.log('sistemFile');
      console.log(sistemFile);
      console.log('eventImage1.files');
      console.log(eventImage1.files);
      
      spinner.classList.add("d-none");
      output.classList.remove("d-none");
    };

    eventImage1.onchange = async function change() {

      const spinner = document.getElementById('spinner');
      const output = document.getElementById('preview');

      spinner.classList.remove("d-none");
      output.classList.add("d-none");
      output.innerHTML = '';

      const maxWidth = 1024;
      const maxHeight = 540;
      let result = [];
      let i = 1;
      if (sistemFile) {
        result.push(...sistemFile);
        for (const file of result) {
          const url = URL.createObjectURL(file);
          const newElement = document.createElement("div");
          newElement.classList.add("col-12");
          if(i !== 3){
            newElement.classList.add("col-md-6");
          }else{
            newElement.classList.add("col-md-12");
          }
          newElement.classList.add("col-lg-4");
          newElement.classList.add("mx-auto");
          newElement.innerHTML = `<div class="card">
                                    <div class="card-img-top img-fluid" style="background-image: url(${url});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;height:300px;">
                                    </div>
                                    <div class="card-body bg-light text-center">
                                      <a href="#" onclick="girar('${file.name}')" class="btn btn-outline-primary waves-effect">Girar</a>
                                      <a href="#" onclick="borrar('${file.name}')" class="btn btn-outline-primary waves-effect">Eliminar</a>
                                      <h3 class="text-muted">Event Image ${i}</h3>
                                    </div>
                                  </div>`;
          
          output.appendChild(newElement);
          i++;
        };
      }

      for (const filet of this.files) {
        if (result.length <= 2) {
          file = await convertHEIC(filet);
          
          const canvas = document.createElement('canvas');
          const ctx = canvas.getContext('2d');
              // convert any heic (and do any other prep) before uploading the file
          const img = await file.image();
          // const img = file.image();
          
          // calculate new size
          const ratio = Math.min(maxWidth / img.width, maxHeight / img.height);
          const width = img.width * ratio + .5 | 0;
          const height = img.height * ratio + .5 | 0;

          // resize the canvas to the new dimensions
          canvas.width = width;
          canvas.height = height;

          // scale & draw the image onto the canvas
          ctx.drawImage(img, 0, 0, width, height);
          const generateId = () => Math.random().toString(36).substr(2, 18);
          const nameFile = 'img'+generateId();
          // just to preview
          // output.appendChild(canvas);

          // Get the binary (aka blob)
          const blob = await new Promise(rs => canvas.toBlob(rs, 1));
          // const blob = new Promise(rs => canvas.toBlob(rs, 1));
          const resizedFile = new File([blob], nameFile, file);
          const url = URL.createObjectURL(resizedFile);
          console.log(resizedFile);
          
          const newElement = document.createElement("div");
          newElement.classList.add("col-12");
          if(i !== 3){
            newElement.classList.add("col-md-6");
          }else{
            newElement.classList.add("col-md-12");
          }
          newElement.classList.add("col-lg-4");
          newElement.classList.add("mx-auto");
          newElement.innerHTML = `<div class="card">
                                    <div class="card-img-top img-fluid" style="background-image: url(${url});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;height:300px;">
                                    </div>
                                    <div class="card-body bg-light text-center">
                                      <a href="#" onclick="girar('${nameFile}')" class="btn btn-outline-primary waves-effect">Girar</a>
                                      <a href="#" onclick="borrar('${nameFile}')" class="btn btn-outline-primary waves-effect">Eliminar</a>
                                      <h3 class="text-muted">Event Image ${i}</h3>
                                    </div>
                                  </div>`;
          
          output.appendChild(newElement);
          result.push(resizedFile);
          i++;
        }
      }

      const fileList = new FileListItem(result);
      if (fileList.length > 3) {fileList.length = 3;};

      eventImage1.onchange = null;
      eventImage1.files = fileList;
      eventImage1.onchange = change;

      sistemFile = null;
      sistemFile = fileList;

      spinner.classList.add("d-none");
      output.classList.remove("d-none");

      console.log(sistemFile);
      console.log(eventImage1.files);
    }

  </script>
    
@endpush