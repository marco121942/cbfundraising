<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

       <!--<h1 class="logo"><a href="index.html">Multi</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ url('/') }}" id="logo" class="logo">
            <img src="{{ asset('assets/img/CB Fundraising Logo Dorado.png') }}" alt="logotipo" class="img-fluid">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
        @if (Route::currentRouteName() == "welcome")
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        @endif

        @if (Route::currentRouteName() !== "event")
        @if (Route::currentRouteName() !== "adminEvent")
        @if (Route::currentRouteName() !== "donate")
        @if (Route::currentRouteName() !== "game")
          @if (session()->has('back'))
            @php
              $cadena_de_texto = session('back');
              $event = 'event';
              $donate = 'donate';
              
              $coincidencia_donate = strpos($cadena_de_texto, $donate);
              $coincidencia_event = strpos($cadena_de_texto, $event);
              
              $posicion = '';

              if ($coincidencia_donate !== false) {
                $posicion = $donate;
              } else if ($coincidencia_event !== false) {
                $posicion = $event;
              }
            @endphp
            <li><a href="{{ session('back') }}" class="getstarted scrollto">Back {{ $posicion }}</a></li>
          @endif
        @endif
        @endif
        @endif
        @endif
        
        @if (Route::currentRouteName() !== "login")
        @if (Route::currentRouteName() !== "register")
                @auth
                  @if(Route::currentRouteName() !== "game") 
                    @if (session()->has('games'))
                      <li><a href="{{ url('/game') }}" class="getstarted scrollto position-relative">
                        Games
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                          {{ session('games') }}
                        </span>
                      </a></li>
                    @endif
                  @else
                    @if (session()->has('games'))
                      @php
                        $numero = session('games') - 1;
                      @endphp
                      @if($numero > 0)
                        <li><a href="{{ url('/game') }}" class="getstarted scrollto position-relative">
                          Games
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $numero }}
                          </span>
                        </a></li>
                      @endif
                    @endif
                  @endif
                  @role('admin')
                    <li><a href="{{ url('/dashboard') }}" class="getstarted scrollto">Dashboard</a></li>
                  @endrole
                  @role('org')
                    <li><a href="{{ url('/dashboard') }}" class="getstarted scrollto">Dashboard</a></li>
                  @endrole
                  @role('donate')
                  
                  @endrole
                    <!-- Authentication -->
                    <a href="{{ route('logout') }}"
                       class="getstarted scrollto"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Log out') }}
                    </a>
                    <form method="POST" id="logout-form" class="d-none" action="{{ route('logout') }}">
                        @csrf
                    </form>
                @endif
        @endif
        @endif

        @if (Route::currentRouteName() !== "login")
            @auth
              
            @else
                <li><a href="{{ route('login') }}" class="getstarted scrollto">Log in</a></li>
            @endif
        @endif
        @if (Route::currentRouteName() !== "register")
            @auth
              
            @else
                <li><a href="{{ route('register') }}" class="getstarted scrollto">Sign Up</a></li>
            @endif
        @endif
            </ul>
            @auth
              @if(Route::currentRouteName() !== "game") 
                @if (session()->has('games'))
                  <i class="bi bi-list mobile-nav-toggle">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger py-1">
                      <h6 class="my-0 h6">
                        {{ session('games') }}
                      </h6>
                    </span>
                  </i>
                @else
                  <i class="bi bi-list mobile-nav-toggle"></i>
                @endif
              @else
                @if (session()->has('games'))
                  @php
                    $numero = session('games') - 1;
                  @endphp
                  @if($numero > 0)
                    <i class="bi bi-list mobile-nav-toggle">
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger py-1">
                        <h6 class="my-0 h6">
                          {{ $numero }}
                        </h6>
                      </span>
                    </i>
                  @else
                    <i class="bi bi-list mobile-nav-toggle"></i>
                  @endif
                @endif
              @endif
            @else
            <i class="bi bi-list mobile-nav-toggle"></i>
            @endif
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
@if (Route::currentRouteName() == "welcome")
<section id="hero">

    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('assets/img/Bacground\ Hero.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>CB Fundraising</span></h2>
              <p class="animate__animated animate__fadeInUp">We work to connect your event with the world</p>
              <a href="{{ route('register') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Sign Up</a>
              <a href="https://consultoriafinanciera-rivera.wistia.com/medias/jgkhm1vj33" class="glightbox btn-watch-video"  target="blank" ><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/1.png')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Create an account !</h2>
              <p class="animate__animated animate__fadeInUp">Creating an account is quick and easy, just sign up and discover the new way to raise funds.</p>
              <a href="https://consultoriafinanciera-rivera.wistia.com/medias/dli2ngti5z" class="glightbox btn-watch-video" target="blank"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/2.png')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Share your event on your social networks</h2>
              <p class="animate__animated animate__fadeInUp">Create a donation link and share with all your friends to support your event</p>
              <a href="{{ route('login') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Log in</a>
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

    </div>
</section><!-- End Hero -->
@endif

@if (Route::currentRouteName() == "donate")
<section id="hero">
    
 

      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url( {{asset('assets/img/stacked-coins-with-dirt-plant.jpg')}})">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown text-center ">Thank you for your colaboration!</h2>
            <p class="align-items-center ">Every donation has a mission.</p>
            <a href="#services" class="btn-get-started scrollto">Donate</a>
            
          </div>
        </div>
      </div>

</section> 
@endif

@if (Route::currentRouteName() == "login" or Route::currentRouteName() == "password.reset")
<!-- ======= Hero Section ======= -->
<section id="hero-login" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>Your event is waiting for you</h1>
          <h6>Track what you have already collected in real time</h6>
        </div>
      </div>
    </div>

</section><!-- End Hero -->
@endif

@if (Route::currentRouteName() == "register" or Route::currentRouteName() == "password.request")
<!-- ======= Hero Section ======= -->
<section id="hero-register" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>Welcome!</h1>
          <h6>Discover the new way to raise funds easy and fun</h6>
        </div>
      </div>
    </div>

</section><!-- End Hero -->
@endif

@if (Route::currentRouteName() == "sponsor")
<!-- ======= Hero Section ======= -->
<section id="hero-register" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-md-6">
          <h1>About us ?</h1>
          <h6>CBfundraising is a platform that helps raise funds in an easy and fun way. Making your experience something unique and different in a 100% Virtual way</h6>
        </div>
      </div>
    </div>

</section><!-- End Hero -->
@endif

@if (Route::currentRouteName() == "event")
<!-- ======= Hero Section ======= -->
  <section id="hero1" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="text-center">
          <h1>We help without excuses</h1>
          <h4>Now it's your turn, donate and start helping</h4>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endif
