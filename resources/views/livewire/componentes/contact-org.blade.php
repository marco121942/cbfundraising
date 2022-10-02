<div class="infinity-container">
  <div class="infinity-form-block row justify-content-center">

    <div class="text-center"> <a href="#" class="btn-get-started query col-12 col-md-12 text-center" data-bs-toggle="modal" data-bs-target="#myModal">Contact Event Organizer</a></div>

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
                  <form wire:submit="enviar()" class="php-email-form">
                    @auth
                    @else
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" id="name" wire:model.defer='name' placeholder="Your Name" required>
                    </div>
                    <div class="form-group mt-3">
                      <input type="email" class="form-control" name="email" id="email" wire:model.defer='email' placeholder="Your Email" required>
                    </div>
                    @endauth
                    <div class="form-group mt-3">
                      <textarea class="form-control" id="body" name="body" wire:model.defer='body' rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn-get-started col-md-3 text-center" wire:loading.class="disabled" wire:loading.attr="disabled"><strong>Send message</strong></button>
                    </div>
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