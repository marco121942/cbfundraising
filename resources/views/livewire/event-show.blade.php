@section('title', 'Event')

@push('css')
<link href="{{ asset('assets/css/front/event/event.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/front/event/style.css') }}" rel="stylesheet">
@endpush
  <main id="main">

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="py-3 py-md-5 bg-white">
        <div class="container" data-aos="zoom-in">
  
          <div class="text-center col-md">
            <h1 class="titulo-event2">Our event</h1>
            <h2 class="subtitulo-event2">Colaborate with us!</h2>
            
          </div>
  
        </div>
      </section><!-- End Cta Section -->

@if($evento)
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{url('/')}}/{{ $evento->eventImage1 }});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2 class="text-center" >{{ $evento->title1 }}</h2>
              <a class="content">{{ $evento->description1 }}</a>
            </div>
          </div>
        </div>
        
        @if($evento->title2)
        @if($evento->description2)

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{url('/')}}/{{ $evento->eventImage2 }});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2 class="text-center" >{{ $evento->title2 }}</h2>
              <a class="content">{{ $evento->description2 }}</a>
            </div>
          </div>
        </div>
        @endif
        @endif
    
        @if($evento->title3)
        @if($evento->description3)
        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{url('/')}}/{{ $evento->eventImage3 }});background-position: center;BACKGROUND-SIZE: contain;background-repeat: no-repeat;">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2 class="text-center" >{{ $evento->title3 }}</h2>
              <a class="content">{{ $evento->description3 }}</a>
            </div>
          </div>
        </div>
        @endif
        @endif

      </div>
      @if($evento->title2)
      @if($evento->description2)

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
      @endif
      @endif

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
    
  </section><!-- End Hero -->
     
  <section class="bg_animate">
   

    <div class="banner contenedor">
        
         <!-- ======= Get Started Section ======= -->
    <section id="get-started" class=" text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">

          <h1>Donate and win</h1>
          

        </div>
      </div>

      <div class="container">
        <div class="row">
          
          <x-shared-popover-button :evento="$evento" class="col-md-3 mb-3" />
                    
          <div class="col-md  query2" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-block">

              <img class="img-responsive" src="{{ asset('assets/img/BOLETO EVENTO FINAL.png') }}" alt="img">
              

            </div>
          </div>

          <div class="text-center">
            <a href="{{ route('donate', ['event' => $evento->slug]) }}" class="btn-get-started query col-md-3 text-center ">Donate</a>
          </div>

        </div>
      </div>

    </section><!-- End Get Started Section -->


    <div class="burbujas">
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
    </div>
   </div>

  </section>

  
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="padd-section">
    <div class="infinity-container">
      <div class="infinity-form-block row justify-content-center">

        <div class="text-center"> <a href="#" class="btn-get-started query col-12 col-md-12 text-center" data-bs-toggle="modal" data-bs-target="#myModal">Contact Event Organizer</a></div>

                  <!-- The Modal -->
            
        <div class="modal" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title text-center">Talk with the Organizer event</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
                <h1 class="text-center">Hello!</h1>
                <p class="justify-content text-center ">If you have any questions you can talk with us!</p>
                 <!-- ======= Contact Section ======= -->
                <section id="contact" class="padd-section">

                  
                    <div class="form">
                      <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-group">
                          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group mt-3">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group mt-3">
                          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                          <div class="loading">Loading</div>
                          <div class="error-message"></div>
                          <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"> <a href="#" class="btn-get-started col-md-3 text-center "><strong>Send message</strong></a></div>
                      </form>
                     </div>
                 
               </section><!-- End Contact Section -->

              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
        
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section><!-- End Contact Section -->

@else


    <section class="bg_animate">
   

    <div class="banner contenedor">
        
         <!-- ======= Get Started Section ======= -->
    <section id="get-started" class=" text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">

          <h1>Donate and win</h1>
          

        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-12  query2" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-block">

              <img class="col-4" src="{{ asset('assets/img/BOLETO EVENTO FINAL.png') }}" alt="img">
              

            </div>
          </div>


          <div class="col-md-12 container" data-aos="fade-up">
            <div class="section-title text-center">

              <h1>Not Event</h1>


            </div>
          </div>

        </div>
      </div>

    </section><!-- End Get Started Section -->


    <div class="burbujas">
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
    </div>
   </div>

  </section>

@endif


    
    <div class='mb-5'>
      <h1 class="titulo-event text-center ">Our partners</h1>
      <h5 class="subtitulo-event text-center">Receive discount coupons, gift cards and amazing rewards from all of our partners.</h5>
    </div>

    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

           <!-- ======= Gallery Section ======= -->    
           <section id="gallery" class="gallery">
            <div class="gallery-slider swiper-container">
              <div class="swiper-wrapper align-items-center">
                
                @foreach($partners as $partner)
                  <div class="swiper-slide"><a class="gallery-lightbox" href="https://{{ $partner->link }}" target="_blank"><img src="{{ asset($partner->image) }}" class="img-fluid" alt=""></a></div>
                @endforeach
                
                <!-- <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/2.png') }}" class="img-fluid" alt=""></a></div> -->
                <!-- 
                <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/3.png') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/4.png') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/5.png') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/6.png') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="{{ asset('assets/img/Auspiciadores/7.png') }}" class="img-fluid" alt=""></a></div> -->
              </div>
    
              <div class="swiper-pagination"></div>
            </div>
    
          </div>
        </section> 
       </div>
        </div>
      </div>
    </footer><!-- End Footer -->
   
  </main><!-- End #main -->

@push('js')
  <script src="{{ asset('assets/js/principal-nuevo.js') }}" defer></script>
@endpush
