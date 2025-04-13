<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArquivoAtualizadoNotification extends Notification
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
            ->subject('Atualização de Status do Arquivo'. $this->arquivo->nome_original)
            ->line('O arquivo está atualmente no status: '. $this->arquivo->status->value)
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
