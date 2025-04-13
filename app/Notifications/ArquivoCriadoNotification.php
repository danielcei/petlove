<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArquivoCriadoNotification extends Notification
{
    use Queueable;

    protected $arquivo;

    public function __construct($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Novo Arquivo Disponível')
            ->line('Um novo arquivo foi criado e está disponível.')
            ->action('Ver Arquivo', url('admin/arquivos/'));
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => 'Um novo arquivo foi criado.',
            'arquivo_id' => $this->arquivo->id,
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'arquivo_id' => $this->arquivo->id,
            'message' => 'Um novo arquivo foi criado e enviado para você.',
        ];
    }
}
