@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">
  


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

@endpush

@section('content')
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="section-title">
      <h2>About</h2>
      <p>Find out more about us</p>
    </div>

    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
          <script src="https://fast.wistia.com/embed/medias/jgkhm1vj33.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_jgkhm1vj33 videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/jgkhm1vj33/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
        </div>

        <div class="col-lg-6 pt-3 pt-lg-0 content">
          <h3>We reinvent the way of raising funds</h3>
          <p class="fst-italic">
            CB Fundraising helps you provide a friendly space to raise funds.  In a fun and easy way with just a click, Share your link and start raising funds.
          </p>
          <ul>
            <li><i class="bx bx-check-double"></i>Sign up free</li>
            <li><i class="bx bx-check-double"></i>Share on social networks</li>
            <li><i class="bx bx-check-double"></i>Raise funds</li>
            <li><i class="bx bx-check-double"></i>Obtain big profits</li>
          </ul>
          <p>
            You can register and obtain funds instantly,  without the need  of sales or collecting money. their has never been an easy and fun  way to raise funds . All the above can be found in one place at CB Fundraising.
          </p>
        </div>

      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= About Boxes Section ======= -->
  <section id="about" class="about-boxes">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <img src="assets/img/Mision/1.png" class="card-img-top" alt="...">
            <div class="card-icon">
              <i class="bi bi-bullseye"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="">Our Mission</a></h5>  
              <p class="card-text">We are a platform that helps raise funds in an easy and fun way. Making your experience unique and different, 100% virtual.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="card">
            <img src="assets/img/Mision/3.png" class="card-img-top" alt="...">
            <div class="card-icon">
              <i class="ri-calendar-check-line"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="">Our Commitment</a></h5>
              <p class="card-text">Our leaders are committed in helping you with your needs,  So we can meet your goals.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="card">
            <img src="assets/img/Mision/2.png" class="card-img-top" alt="...">
            <div class="card-icon">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="">Our Vision</a></h5>
              <p class="card-text">To become by the year 2025 a platform used throughout the world and in all languages ​​to raise funds for public and private charitable causes.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Boxes Section -->

  <!-- ======= Counts Section ======= -->
  <section id="about" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="80237" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Happy Donors</strong> consequuntur quae qui deca rode</p>
            <a href="{{ route('register') }}">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Promoted events</strong></p>
            <a href="{{ route('register') }}">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="3463" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Hours Of Support</strong></p>
            <a href="{{ route('register') }}">Find out more &raquo;</a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Sponsors</strong></p>
            <a href="{{ url('/sponsor') }}">Find out more &raquo;</a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
          <script src="https://fast.wistia.com/embed/medias/dli2ngti5z.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_dli2ngti5z videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/dli2ngti5z/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
        </div>

        <div class="col-lg-6 pt-3 pt-lg-0 content">
          <h3>Advantages of working with<strong> CB Fundraising</strong></h3>
          <p class="fst-italic">
            In such a connected world, CBFundraising becomes a one-of-a-kind platform that allows all parties that make up its model to benefit.
          </p>
        </div>

      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Featured Section ======= -->
  <section id="about" class="featured">
    <div class="container">

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <figure>
                <img src="assets/img/features/100 Online Final.gif" alt="" class="img-fluid">
              </figure>
            </div>

            <div class="tab-pane" id="tab-2">
              <figure>
                <img src="assets/img/features/Grandes Ganancias.gif" alt="" class="img-fluid">
              </figure>
            </div>

            <div class="tab-pane" id="tab-3">
              <figure>
                <img src="assets/img/features/No colectas de dinero.gif" alt="" class="img-fluid">
              </figure>
            </div>

            <div class="tab-pane" id="tab-4">
              <figure>
                <img src="assets/img/features/Venta via redes.gif" alt="" class="img-fluid">
              </figure>
            </div>

            <div class="tab-pane" id="tab-5">
              <figure>
                <img src="assets/img/features/No venta de puerta en puerta .gif" alt="" class="img-fluid">
              </figure>
            </div>

            <div class="tab-pane" id="tab-6">
              <figure>
                <img src="assets/img/features/Envio no.gif" alt="" class="img-fluid">
              </figure>
            </div>

          </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                <h4>100% Online</h4>
                <p>All in one place with  just a click.</p>
              </a>
            </li>

            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                <h4>Big profits</h4>
                <p>There is no fundraising limit</p>
              </a>
            </li>

            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                <h4>No collection </h4>
                <p>it is no longer necessary to involve many people for your event.</p>
              </a>
            </li>

            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                <h4>Sell ​​on social media</h4>
                <p>Share your donation link on your social networks to all your friends and tell them to support your cause or event</p>
              </a>
            </li>

            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-5">
                <h4>No door to door sales</h4>
                <p>Donate comfortably from your home or wherever you are. It's that simple and fun.</p>
              </a>
            </li>

            <li class="nav-item mt-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-6">
                <h4>No delivery</h4>
                <p>You no longer need shipping to donate</p>
              </a>
            </li>

          </ul>
        </div>
      </div>

    </div>
  </section><!-- End Featured Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="about">
    <div class="section-title">
      <h2>SERVICES</h2>
      <p>We work for you</p>
    </div>
    
    <div class="container">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
          <script src="https://fast.wistia.com/embed/medias/4pbbycuhw0.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:52.08% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_4pbbycuhw0 videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/4pbbycuhw0/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
          <h3>Raise funds with one click</h3>
          <p class="fst-italic">
            CB Fudraising is the solution you need to raise funds
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i> Fast</li>
            <li><i class="bi bi-check-circle"></i> Sucure</li>
            <li><i class="bi bi-check-circle"></i>Easy</li>
            <li><i class="bi bi-check-circle"></i>Funny</li>
          </ul>
          <p>
            Sign up for free and start receiving funds in a matter of minutes
          </p>
        </div>
      </div>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h1 class="text-center titulo">Features</h1>
      </header>

      <div class="row">

        <div class="col-lg-6">
          <img src="assets/img/features.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
          <div class="row align-self-center gy-4">

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Fast</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Secure</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Easy</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Fun</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Simple</h3>
              </div>
            </div>

            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-check"></i>
                <h3>Free of charge</h3>
              </div>
            </div>

          </div>
        </div>

      </div> <!-- / row -->
    </div>

  </section><!-- End Features Section -->
    
  <!-- ======= Features Section ======= -->
  <section class="features1">
    <div class="container">

      <div class="row" data-aos="fade-up">
        <div class="col-md-6">
          <img src="assets/img/features-1.svg" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 pt-5">
          <h3>Top 10 on Technology</h3>
          <p class="fst-italic">
            Our platform has the best technology on the market
          </p>
          <ul>
            <li><i class="bi bi-check"></i>Responsive</li>
            <li><i class="bi bi-check"></i>Customizable dashboard</li>
            <li><i class="bi bi-check"></i>Automated</li>
            <li><i class="bi bi-check"></i>Ux/Ix</li>
          </ul>
        </div>
      </div>

      <div class="row" data-aos="fade-up">
        <div class="col-md-5 order-1 order-md-2">
          <img src="assets/img/features-3.svg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 pt-5 order-2 order-md-1">
          <h3>There's still more</h3>
          <p class="fst-italic">
            You can chat with us in real time
          </p>
          <p>
            Let's go! one of our agents is waiting ...
          </p>
        </div>
      </div>
    </div>
  </section><!-- End Features 1 Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">

    <div class="container" data-aos="zoom-in">
      <div class="quote-icon">
        <i class="bx bxs-quote-right"></i>
      </div>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                It has been a pleasure working with you. I would highly recommend your company to anyone who is fundraising for the first time.
              </p>
              <img src="assets/img/testimonials/1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                This is the first time we worked with CB Fundraising it was so simple and easy to use. Totally recommended.
              </p>
              <img src="assets/img/testimonials/2.png" class="testimonial-img" alt="">
              <h3>Ruth peralta</h3>
              <h4>Student</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                Thank you for everything your company did to make our fundraiser a success. We will definitely be using your company again.
              </p>
              <img src="assets/img/testimonials/3.png" class="testimonial-img" alt="">
              <h3>Jesus Alvarez</h3>
              <h4>Businessman</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                CB Fundraising has been a wonderful company to deal with, I am so pleased your service was and has been excellent.
              </p>
              <img src="assets/img/testimonials/4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                Thanks to your excellent fundraising system, our small group of students was able to raise enough money. The fundraiser was just super and we were very happy with the results.
              </p>
              <img src="assets/img/testimonials/5.png" class="testimonial-img" alt="">
              <h3>Migdalia Vargas</h3>
              <h4>Teacher</h4>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                Big thanks to cb fundraising.. very easy to use and it helped me raise fund for my kids baseball uniforms. Please follow if you need to raise fund for your activity.
              </p>
              <img src="assets/img/testimonials/6.png" class="testimonial-img" alt="">
              <h3>Rene Alicea</h3>
              <h4>Baseball Team</h4>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->
     
  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </div>

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How can you use CB Fundraising?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Using CBFundraising is easy and fun. You just have to enter the page, register, log in, fill in your information, customize your event, publish it, get a donation link and share it to start receiving donations.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How can I share the link?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            You can share it from your mobile, computer or tablet, with just one click.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Do I have to invest?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            You don't have to invest anything, just fill in the required information and start fundraising.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How do I raise funds?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Just fill in your information share the link and start fundraising easy and fun.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>For which events can I raise funds with CBFundraising?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            School, Sports, Personal and life events; Among others.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

    </div>
  </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Sign up, it's free!</h3>
        <p>Register and discover how we can help you connect your fundraising event with your friends, family or anyone in the world. We work to connect your event with the world.</p>
        <a class="cta-btn" href="{{ route('register') }}" target="blank">Raise Funds Now</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>Ocean Springs MS 39564-8425</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@cbfundraising.site <br> admin@cbfundraising.site</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>(228)609-0519<br></p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Hey!</h3>
        <p>Promote your business</p>
        <a class="cta-btn" href="{{ route('sponsor') }}">Join Now</a>
      </div>

    </div>
  </section><!-- End Cta Section -->
@stop

@push('js')
  <!-- Template Main JS File -->
  
@endpush