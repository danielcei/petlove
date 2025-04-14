<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PetResource;
use App\Models\Pet;
use Filament\Widgets\Widget;

class WelcomeMessage extends Widget
{
    protected static string $view = 'filament.widgets.welcome-message';

    public $pets;

    public function mount()
    {
        $this->pets = Pet::where('user_id', auth()->id())->get();
    }

    public function callAction(string $action, int $recordId)
    {
        return redirect()->to(PetResource::getUrl('edit', [$recordId]));
    }

    public function callCreate(string $action)
    {
        return redirect()->to(PetResource::getUrl('create'));
    }
}
