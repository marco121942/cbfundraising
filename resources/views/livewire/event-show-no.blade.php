@section('title', 'Event')
@push('css')
    <link href="{{ asset('assets/css/front/event/event.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/front/event/style.css') }}" rel="stylesheet">
@endpush

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

 <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
  
          <div class="text-center col-md">
            <h1 class="titulo-event2">Our event</h1>
            <h2 class="subtitulo-event2">Colaborate with us!</h2>
            
          </div>
  
        </div>
      </section><!-- End Cta Section -->

   
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        @php
            $imagen1 = $evento->eventImage1;
            $imagen1 = str_replace(' ','%20',$imagen1);
        @endphp
        <div class="carousel-item active" style="background-image: url({{url('/')}}/{{ $imagen1 }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2 class="text-center">{{ $evento->title1 }}</h2>
              <a class="content">{{ $evento->description1 }}</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        @php
            $imagen2 = $evento->eventImage2;
            $imagen2 = str_replace(' ','%20',$imagen2);
        @endphp
        <div class="carousel-item" style="background-image: url({{url('/')}}/{{ $imagen2 }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2 class="text-center" >{{ $evento->title2 }}</h2>
              <a class="content">{{ $evento->description2 }}</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        @php
            $imagen3 = $evento->eventImage3;
            $imagen3 = str_replace(' ','%20',$imagen3);
        @endphp
        <div class="carousel-item" style="background-image: url({{url('/')}}/{{ $imagen3 }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2 class="text-center" >{{ $evento->title3 }}</h2>
              <a class="content">{{ $evento->description3 }}</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->


    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
          <img src="{{url('/')}}/{{ $evento->eventImage1 }}" class="card-img-top" alt="...">
        </div>

        <div class="col-lg-6 pt-3 pt-lg-0 content">
          <h3>{{ $evento->title1 }}</h3>
          <p class="fst-italic">
            {{ $evento->description1 }}
          </p>
        </div>

      </div>
    </div>

  

     <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center col-md">
          <h3>Donate now</h3>
          <p>Register, donate and win many gifts</p>
        @auth
            <a href="#" class="cta-btn" >Donate</a>    
            {{ session()->forget('redirect_to') }}
        @else
            {{ session(['redirect_to' => url()->current()])}}
            <a href="{{ route('login') }}" class="cta-btn" >Log in</a>
            <a href="{{ route('register') }}" class="cta-btn" >register</a>
        @endif
          
        </div>

      </div>
    </section><!-- End Cta Section -->

     <!-- ======= Gallery Section ======= -->
    <div class="section-title">
      <h1 class="mt-5">Our Sponsors</h1>
      <a>Receive gifts, prizes, discount coupons and much more from our sponsors</a>
    </div>

    <section id="gallery" class="gallery mb-5">

      <div class="container" data-aos="fade-up">


        <div class="gallery-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/1.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/2.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/3.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/4.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/5.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/6.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/7.png')}}" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

</main><!-- End #main -->

@push('js')
  
  <script src="{{ asset('assets/js/principal.js') }}" defer></script>
    
@endpush
