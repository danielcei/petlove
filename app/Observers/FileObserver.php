<?php

namespace App\Observers;

use App\Models\File;
use App\Models\Role;
use App\Models\User;
use App\Notifications\FileCriadoNotification;

class FileObserver
{
    /**
     * Handle the Arquivo "created" event.
     */
    public function created(File $arquivo)
    {
        $usuariosBackoffice = User::whereHas('roles', function ($query) {
            $query->whereIn('id', [Role::BACKOFFICE, Role::ADMIN]);
        })->get();

        foreach ($usuariosBackoffice as $usuario) {
            $usuario->notify(new FileCriadoNotification($arquivo));
        }
    }

    /**
     * Handle the Arquivo "updated" event.
     */
    public function updated(File $arquivo): void
    {

    }

    /**
     * Handle the Arquivo "deleted" event.
     */
    public function deleted(File $arquivo): void
    {
        //
    }

    /**
     * Handle the Arquivo "restored" event.
     */
    public function restored(File $arquivo): void
    {
        //
    }

    /**
     * Handle the Arquivo "force deleted" event.
     */
    public function forceDeleted(File $arquivo): void
    {
        //
    }
}
