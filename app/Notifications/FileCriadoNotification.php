<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FileCriadoNotification extends Notification
{
    use Queueable;

    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Novo Arquivo Enviado para o FPT')
            ->line('Um novo arquivo enviado para o FPT.')
            ->action('Ver Arquivo', url('admin/files/'));
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => 'Um novo arquivo foi enviado.',
            'file_id' => $this->file->id,
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'arquivo_id' => $this->file->id,
            'message' => 'Um novo arquivo foi criado e enviado para você.',
        ];
    }
}
