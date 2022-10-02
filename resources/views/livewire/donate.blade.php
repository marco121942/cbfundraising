@section('title', 'Donate')
@push('css')
    <link href="{{ asset('assets/css/front/donate/donate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/front/donate/style.css') }}" rel="stylesheet">
@endpush

  <main id="main">
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h1>Donate, scratch and win</h1>
          <a class="texto">Easy and simple</a>
        </div>

        <div class="row content justify-content-center">
          <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('assets/img/raspa.gif') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-4 pt-6" data-aos="fade-left" data-aos-delay="100">
            <h3>How does it work?</h3>
            <p class="fst-italic">
              The game consists of the following steps
            </p>
            <ul>
              <li><i class="bi bi-check"></i>Select one or more tickets</li>
              <li><i class="bi bi-check"></i> Make your donation</li>
              <li><i class="bi bi-check"></i> Scratch the tiket</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services" wire:ignore>

      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h1>Start the game</h1>
          <a class="texto">Select a ticket</a>
        </div>

        <div class="row gy-4">
          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue mx-auto">
              <img src="{{ asset('assets/img/boletos/2$.png') }}" alt=""><br>
              @if(isset($event_id[0]))
              <div class="form-group col-md my-0">
                <label for="exampleInputEmail1">Select one or more</label>
                <div class="container2">
                  <span class="next" onclick="nextNum()"></span>
                  <span class="prev" onclick="prevNum()"></span>
                  <div id="box"></div>

                  <script type="text/javascript">
                   var numbers = document.getElementById("box");
                 
                   var span = document.createElement ("span");
                   span.textContent = 1;
                   numbers.appendChild(span);
                   
                   var num = numbers.getElementsByTagName("span");
                   
                   function nextNum(){
                     num[0].style.display = "none" ;
                     num[0].style.display = "initial" ;
                     if (num[0].textContent < 100){
                      num[0].textContent ++;
                      };

                   }

                   function prevNum(){
                     num[0].style.display = "none" ;
                     num[0].style.display = "initial" ;
                     if (num[0].textContent > 1){
                      num[0].textContent --;
                      };
                   }
                  </script>
      
                </div>
              </div>
              <button onclick="donar2()" type="button" class="btn btn-primary boton mx-0 mt-2">Make your donation!</button>
              @else
              <a href="{{ url('/') }}" class="logo align-items-center mx-auto my-2">
                  <img src="{{ asset('assets/img/CB Fundraising Logo Dorado.png') }}" alt="" height="75px">
                  <h1>Not Event</h1>
              </a>
              @endif
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange mx-auto">
              <img src="{{ asset('assets/img/boletos/boleto4$_350x350_Mesa de trabajo 1.png') }}" alt=""><br>
              @if(isset($event_id[0]))
              <div class="form-group col-md my-0">
                <label for="exampleInputEmail1">Select one or more</label>
                <div class="container2">
                  <span class="next" onclick="nextNum2()"></span>
                  <span class="prev" onclick="prevNum2()"></span>
                  <div id="box2"></div>

                  <script type="text/javascript">
                   var numbers2 = document.getElementById("box2");
                 
                   var span2 = document.createElement ("span");
                   span2.textContent = 1;
                   numbers2.appendChild(span2);
                   
                   var num2 = numbers2.getElementsByTagName("span");
                   
                   function nextNum2(){
                     num2[0].style.display = "none" ;
                     num2[0].style.display = "initial" ;
                     if (num2[0].textContent < 100){
                      num2[0].textContent ++;
                      };

                   }

                   function prevNum2(){
                     num2[0].style.display = "none" ;
                     num2[0].style.display = "initial" ;
                     if (num2[0].textContent > 1){
                      num2[0].textContent --;
                      };
                   }
                  </script>
      
                </div>
              </div>

              <button onclick="donar4()" type="button" class="btn btn-primary boton mx-0 mt-2">Make your donation!</button>
              @else
              <a href="{{ url('/') }}" class="logo align-items-center mx-auto my-2">
                  <img src="{{ asset('assets/img/CB Fundraising Logo Dorado.png') }}" alt="" height="75px">
                  <h1>Not Event</h1>
              </a>
              @endif
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box green mx-auto">
              <img src="{{ asset('assets/img/Boleto 6USD 300X420.png') }}" alt=""><br>
              @if(isset($event_id[0]))
              <div class="form-group col-md my-0">
                <label for="exampleInputEmail1">Select one or more</label>

                <div class="container2">
                  <span class="next" onclick="nextNum3()"></span>
                  <span class="prev" onclick="prevNum3()"></span>
                  <div id="box3"></div>

                  <script type="text/javascript">
                   var numbers3 = document.getElementById("box3");
                 
                   var span3 = document.createElement ("span");
                   span3.textContent = 1;
                   numbers3.appendChild(span3);
                   
                   var num3 = numbers3.getElementsByTagName("span");
                   
                   function nextNum3(){
                     num3[0].style.display = "none" ;
                     num3[0].style.display = "initial" ;
                     if (num3[0].textContent < 100){
                      num3[0].textContent ++;
                      };

                   }

                   function prevNum3(){
                     num3[0].style.display = "none" ;
                     num3[0].style.display = "initial" ;
                     if (num3[0].textContent > 1){
                      num3[0].textContent --;
                      };
                   }
                  </script>
      
                </div>
              </div>
              <button onclick="donar6()" type="button" class="btn btn-primary boton mx-0 mt-2">Make your donation!</button>
              @else
              <a href="{{ url('/') }}" class="logo align-items-center mx-auto my-2">
                  <img src="{{ asset('assets/img/CB Fundraising Logo Dorado.png') }}" alt="" height="75px">
                  <h1>Not Event</h1>
              </a>
              @endif
            </div>
          </div>
        </div>
        {{--
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
        </button>
        --}}
        @if(isset($event_id[0]))
        <div class="text-center my-3 col-md-3 mx-auto">
          <x-shared-popover-button :evento="$event_id[0]" :normal=false class="col-md-12"/>
        </div>
        @else
        <div class="col-md-12 container" data-aos="fade-up">
          <div class="section-title text-center">

            <h1>Not Event</h1>


          </div>
        </div>
        @endif

      </div>

    </section><!-- End Services Section -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
    
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">login before donation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <ul class="nav nav-tabs text-center" id="list-tab" role="tablist">
                  <li class="nav-item mx-auto px-auto w-50">
                    <a class="nav-link active link-secondary" id="list-signup-list" data-bs-toggle="list" href="#list-signup" role="tab" aria-controls="list-signup" onClick="detectAction('signup')" >Sign Up</a>
                  </li>
                  <li class="nav-item mx-auto px-auto w-50">
                    <a class="nav-link link-secondary" id="list-login-list" data-bs-toggle="list" href="#list-login" role="tab" aria-controls="list-login" onClick="detectAction('login')" >Login</a>
                  </li>
                </ul>
              </div>
              <div class="col-12">
                <div class="tab-content bg-light border border-top-0" id="nav-tabContent">
                  <div class="tab-pane fade show active p-3" id="list-signup" role="tabpanel" aria-labelledby="list-signup-list">
                    <div class="me-md-auto text-center" >
                        <h1 class= "titulo text-secondary" >Sign up free</h1>
                    </div>
                      
                    <div class="me-md-auto text-center">
                        <h6 class="info text-secondary">Donate and win</h6>
                        <p class="info text-secondary">Donate and start helping</p>
                    </div>

              
                    <form method="POST" action="{{ route('register') }}">
                      @csrf
                      <x-jet-validation-errors class="mb-3 rounded-0 text-center" />
                      @if (session()->has('status'))
                          <div class="alert alert-success mb-3 rounded-0" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                        
                      <div class="row">
                        <div class="form-group col-md-6">
                            <x-jet-label class="titulo text-secondary" value="{{ __('*Name') }}" />

                            <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-jet-input-error for="name"></x-jet-input-error>
                            
                        </div>
                        <div class="form-group col-md-6">
                              <x-jet-label class="titulo text-secondary" value="{{ __('*E-mail') }}" />

                              <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control" type="email" name="email" :value="old('email')" required />
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      <a type="button" class="h6 ml-3" onclick="abrirLogin()">
                                        <strong>Try Login</strong>
                                      </a>
                                  </span>
                              @enderror
                        </div>
                        <input name="password" id="password" type="hidden" value="123456789">
                        <input name="rol" id="rol" type="hidden" value="donate">
                        {{--
                        <div class="form-group col-md-3 d-none">
                            <x-jet-label class="titulo text-secondary" value="{{ __('*Password') }}" />

                            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control" type="password" name="password" required autocomplete="new-password" />
                            <x-jet-input-error for="password"></x-jet-input-error>
                        </div>
                        <div class="form-group col-md-3 d-none">
                            <x-jet-label class="titulo text-secondary" value="{{ __('*User') }}" />

                            <select class="{{ $errors->has('rol') ? 'is-invalid' : '' }} select form-control" name="rol" id="rol" required>
                                <option value="donate" selected>User</option>
                                <option value="org">Admin</option>
                            </select> 
                            <x-jet-input-error for="rol"></x-jet-input-error>
                        </div>
                        --}}
                      </div>

                      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="my-3 mx-auto text-center">
                            <div class="">
                                <input type="checkbox" id="terms" name="terms" class="">
                                <label class="{{ $errors->has('terms') ? 'is-invalid' : '' }}" for="terms">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms').'">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('terms').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </label>
                                <x-jet-input-error for="terms"></x-jet-input-error>
                            </div>
                        </div>
                      @endif


                      <div class="form-group col-md-12 mx-md-auto text-center align-items-center my-md-1">

                        <input class="boton" type="submit" name="submit" value="Sign up">

                      </div>

                    </form>
                  </div>
                  <div class="tab-pane fade py-3" id="list-login" role="tabpanel" aria-labelledby="list-login-list">
                  
                    <div class="container me-md-auto text-center">

                        <div class="me-md-auto text-center text-secondary" >
                            <h1 class= "titulo text-secondary">Login</h1>
                        </div>
                    
                        <div class="me-md-auto text-center">
                            <h6 class="info text-secondary">Dónate and win</h6>
                            <p class="info text-secondary">Dónate and star helping</p>
                        </div>


                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <x-jet-validation-errors class="mb-3 rounded-0" />

                            @if (session()->has('status'))
                                <div class="alert alert-success mb-3 rounded-0" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row">

                                <div class="form-group col-md-6 mx-auto">
                                    
                                    <x-jet-label class="titulo text-secondary" for="email" value="{{ __('*E-mail') }}" />

                                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control" type="email"
                                                 name="email" id="email" :value="old('email')" required />
                                    
                                    <x-jet-input-error for="email"></x-jet-input-error>
                                </div>

                                <input name="password" id="password" type="hidden" value="123456789">
                                {{--
                                <div class="form-group col-md-6">                                   
                                    <x-jet-label class="titulo text-secondary" for="password" value="{{ __('*Password') }}" />
                                    <x-jet-input class="{{ $errors->has('password') ? ' is-invalid' : '' }} form-control" id="password" type="password" name="password" required autocomplete="current-password" />
                                    <x-jet-input-error for="password"></x-jet-input-error>
                                </div>
                                --}}

                             </div><br>


                            <div class="form-group col-md-12 mx-md-auto text-center align-items-center" >
                                <input class="boton" type="submit" name="submit" value="Login">

                            </div>

                        </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features mb-0 pb-0" data-aos="fade-up">
      <div class="container">
        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="{{ asset('assets/img/imagen-paypal.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>Your information is safe</h3>
            <p class="fst-italic">
              You can donate from your PayPal account or with your credit card. Our system is end-to-end encrypted so you can make your contribution safely.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End Features Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="padd-section">
      <livewire:componentes.contact-org :evento="$event_id[0]">
    </section><!-- End Contact Section -->

    <div class='mb-5'>
      <h1 class="titulo-event text-center ">Our partners</h1>
      <h5 class="subtitulo-event text-center">Receive discount coupons, gift cards and amazing rewards from all of our partners.</h5>
    </div>
    
    <!-- ======= Footer ======= -->
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
                  <!--
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/1.png" class="img-fluid" alt=""  target= "blanck"></a></div>
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/2.png" class="img-fluid" alt=""></a></div>
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/3.png" class="img-fluid" alt=""></a></div>
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/4.png" class="img-fluid" alt=""></a></div>
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/5.png" class="img-fluid" alt=""></a></div>
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/6.png" class="img-fluid" alt=""></a></div>
                  <div class="swiper-slide"><a class="gallery-lightbox" href="#"><img src="assets/img/Auspiciadores/7.png" class="img-fluid" alt=""></a></div> -->
                </div>

                <div class="swiper-pagination"></div>
              </div>

            </section> 
          </div>
        <!-- End Gallery Section -->           
        </div>
      </div>
    </footer><!-- End Footer -->
  </main>
  <!-- End #main -->

@push('js')
  
  <script src="{{ asset('assets/js/principal-nuevo.js') }}" defer></script>

  <script>
    
    function donar2(){
      console.log('click en donete2');
      @this.donate(2, num[0].textContent);
    };
    function donar4(){
      console.log('click en donete4');
      @this.donate(4, num2[0].textContent);
    };
    function donar6(){
      console.log('click en donete6');
      @this.donate(6, num3[0].textContent);
    };

    let modalAbierto = false;
    let enLogin = false;

    var myModalEl = document.getElementById('exampleModal');
    var myModal = new bootstrap.Modal(myModalEl);

    window.addEventListener('noLoged', event => {
      abrirModal();
      console.log('noLoged');
    });
    
    function abrirModal(){
      myModal.show();
      modalAbierto = true;
      if (enLogin === true) {
        enLogin = false;
        abrirLogin();
      }
    };

    function abrirLogin(){
      var tabLoginEl = document.getElementById("list-login-list");
      var tabLogin = new bootstrap.Tab(tabLoginEl);
      setTimeout(tabLogin.show(), 3000);
    }

    myModalEl.addEventListener('hidden.bs.modal', function (event) {
      modalAbierto = false;
      @this.deletDonation();
    })
    function detectAction(action){  
      console.log('action detectada: ', action);
      @this.detectAction(action);
    }
  </script>

  @if(session()->has('donation'))
    @if(session()->has('action'))
    <script>
      $( document ).ready(function() {
          enLogin = true;
          abrirModal();
      });
    </script>
    @else
    <script>
      $( document ).ready(function() {
          abrirModal();
      });
    </script>
    @endif
  @endif
    
@endpush