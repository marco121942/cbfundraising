<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserWiner extends Mailable
{
    use Queueable, SerializesModels;

    public $premio, $partnerActual, $slug, $suerte, $imgPremio, $enlace;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($premio, $partnerActual, $slug, $suerte, $imgPremio, $enlace)
    {
        $this->premio = $premio;
        $this->partnerActual = $partnerActual;
        $this->slug = $slug;
        $this->suerte = $suerte;
        $this->imgPremio = $imgPremio;
        $this->enlace = $enlace;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        LOG::info('$this->premio');
        LOG::info($this->premio);
        LOG::info('$this->partnerActual');
        LOG::info($this->partnerActual);
        LOG::info('$this->slug');
        LOG::info($this->slug);
        LOG::info('$this->suerte');
        LOG::info($this->suerte);
        LOG::info('$this->imgPremio');
        LOG::info($this->imgPremio);
        LOG::info('$this->enlace');
        LOG::info($this->enlace);
        
        if ($this->suerte === true) {
            return $this->view('mail.user-ganador');
        }else{
            return $this->view('mail.user-perdedor');
        }

    }
}
