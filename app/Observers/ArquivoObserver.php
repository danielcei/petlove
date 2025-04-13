<?php

namespace App\Observers;

use App\Models\Arquivo;
use App\Models\Role;
use App\Models\User;
use App\Notifications\ArquivoAtualizadoNotification;
use App\Notifications\ArquivoCriadoNotification;

class ArquivoObserver
{
    /**
     * Handle the Arquivo "created" event.
     */
    public function created(Arquivo $arquivo)
    {
        $usuariosBackoffice = User::whereHas('roles', function ($query) {
            $query->whereIn('id', [Role::BACKOFFICE, Role::ADMIN]);
        })->get();

        foreach ($usuariosBackoffice as $usuario) {
            $usuario->notify(new ArquivoCriadoNotification($arquivo));
        }
    }

    /**
     * Handle the Arquivo "updated" event.
     */
    public function updated(Arquivo $arquivo): void
    {
        $usuarios = User::where('id', $arquivo->client_id)->get();

        foreach ($usuarios as $usuario) {
            $usuario->notify(new ArquivoAtualizadoNotification($arquivo));
        }
    }

    /**
     * Handle the Arquivo "deleted" event.
     */
    public function deleted(Arquivo $arquivo): void
    {
        //
    }

    /**
     * Handle the Arquivo "restored" event.
     */
    public function restored(Arquivo $arquivo): void
    {
        //
    }

    /**
     * Handle the Arquivo "force deleted" event.
     */
    public function forceDeleted(Arquivo $arquivo): void
    {
        //
    }
}
