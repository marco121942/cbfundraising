@extends('layouts.frontend.app')

@section('title', 'Sponsors')

@push('css')

	<!-- Template Main CSS File -->
	<link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">


	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

@endpush

@section('content')
	<!-- ======= About Section ======= -->
<section id="about" class="about">

		<div class="container" data-aos="fade-up">
		
					<div class="row">
		
						<div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
							<script src="https://fast.wistia.com/embed/medias/dli2ngti5z.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_dli2ngti5z videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/dli2ngti5z/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
						</div>
		
						<div class="col-lg-6 pt-3 pt-lg-0 content">
							<h3>Everything is resolved</h3>
							<p class="fst-italic">
								Our system is designed to help; It allows raising funds through links via SMS, social networks and email. The platform allows sponsors to join the cause while CBfundraising promotes their business or website at no cost.
							</p>
							<p class="fst-italic">
								We  guarantee that in each visit to our platform, we will show your business promotion and discount will be shared so that each visitor can access your website or social network.
							</p>
						</div>
		
					</div>
		
				</div>
			</section><!-- End About Section -->

				<!-- ======= Featured Section ======= -->
<section id="about" class="featured">
		<div class="container">

				<h1 class="titulo-sponsor text-center" >How can I be part of the sponsors of CBfundraising?</h1>

		 

				<div class="col-md">
					<ul class="nav nav-tabs flex-column">
						<li class="nav-item">
							<a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
								<h4>1</h4>
								<p>The sponsor will provide exclusive offers or discounts that will be shared in our platform</p>
							</a>
						</li>

						<li class="nav-item mt-2">
							<a class="nav-link" data-bs-toggle="tab" href="#tab-2">
								<h4>2</h4>
								<p>The sponsor must provide a website, landing page or social network where visitors will go to receive the discounts</p>
							</a>
						</li>

						<li class="nav-item mt-2">
							<a class="nav-link" data-bs-toggle="tab" href="#tab-3">
								<h4>3</h4>
								<p>The sponsor will have an exclusive space for your business to appear on our page</p>
							</a>
						</li>

						<li class="nav-item mt-2">
							<a class="nav-link" data-bs-toggle="tab" href="#tab-4">
								<h4>4</h4>
								<p>The sponsor must provide gift cards that will be distributed on the platform so that the visitor who carries the card will go to their website to buy or exchange their gift card</p>
							</a>
						</li>

						<li class="nav-item mt-2">
							<a class="nav-link" data-bs-toggle="tab" href="#tab-5">
								<h4>5</h4>
								<p>The sponsor decides how long each promotion or sponsorship will be valid</p>
							</a>
						</li>

					 

					</ul>
				</div>
			</div>

		</div>
	</section><!-- End Featured Section -->

		<!-- ======= Contact Section ======= -->
<section id="contact-sponsor" class="padd-section">

<div class="infinity-container">
	<div class="infinity-form-block">

		<div class="text-center query"> <a href="#" class="btn-get-started-sponsor query  col-md-3 text-center" data-bs-toggle="modal" data-bs-target="#myModal">I want to be a sponsor</a></div>


					
					<!-- The Modal -->
		
<div class="modal" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-center">Promote your business</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<h1 class="text-center">Hey!</h1>
			<p class="justify-content text-center ">Start receiving customers automatically, talk with us!</p>
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
						<div class="text-center"> <a href="#" class="btn-get-started-sponsor col-md-3 text-center ">Send message</a></div>
					</form>
		 
				</section><!-- End Contact Section -->

			</div>

 

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>


			
			</div>
		</div>
	</div>
</div>

</section><!-- End Contact Section -->

<section>
<div class="text-center query"> <a href="https://cbfundraising.site" class="btn-get-started-sponsor query  col-md-3 text-center">CBfundraising.site</a></div>
</section>
@stop

@push('js')
	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
@endpush