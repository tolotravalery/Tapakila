<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendActivationEmail extends Notification implements ShouldQueue
{
    use Queueable;

    protected $token;

    /**
     * Create a new notification instance.
     *
     * SendActivationEmail constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->onQueue('social');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $message = new MailMessage;
       /*$message->subject(trans('emails.activationSubject'))
            ->greeting(trans('emails.activationGreeting'))
            ->line(trans('emails.activationMessage'))
            ->line(trans('emails.activationMessage2'))
            ->action(trans('emails.activationButton'), route('authenticated.activate', ['token' => $this->token]))
            ->line(trans('emails.activationThanks'));*/


      $message->view('emails.activation')
       ->action('Activer', route('authenticated.activate', ['token' => $this->token]));

        return ($message);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
