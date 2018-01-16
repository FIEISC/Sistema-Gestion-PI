<?php

namespace sigespi\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MensajeEnviado extends Notification
{

    protected $mensaje;

    use Queueable;

    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
          return [
        'link' => route('verNotificacion', $this->mensaje->id),
        /*'asunto' => $this->mensaje->asunto,*/
        'asunto' => "Asunto: " . $this->mensaje->asunto . " por: " . $this->mensaje->sender->nom_docente
        ];

       /* return $this->mensaje->toArray();*/
    }
}
