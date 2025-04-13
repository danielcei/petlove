<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class SendValidadeCodeShalom extends Notification
{
    use Queueable;

    protected string $code;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(Lang::get('Codigo de Confirmação!'))
            ->line(Lang::get('Obrigado por se cadastrar conosco! Para completar o processo de cadastro, por favor,
            confirme sua conta inserindo o código de confirmação abaixo no local indicado em nosso site ou aplicativo.'))
            ->line(Lang::get('Este código é válido por 30 minutos e deve ser usado apenas uma vez'))
            ->line('<br>')
            ->line(Lang::get('Código de Confirmação: [' . $this->code . ']'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
