<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends ResetPassword
{
    use Queueable;

    // public function __construct()
    // {
    //     //
    // }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password')
            ->greeting('Reset Password')
            ->line('Dear '.$notifiable->name.',')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', route('password.reset', $this->token).'?email='.$notifiable->email)
            ->line('If you did not request a password reset, no further action is required.');
    }

    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
}
