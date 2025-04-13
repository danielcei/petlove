<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TypePerson: string implements HasLabel, HasIcon, HasColor
{
    case PF = 'pf';
    case PJ = 'pj';

    public static function getFilteredOptions(): array
    {
        return [
            self::PF->value => self::PF->getLabel(),
            self::PJ->value => self::PJ->getLabel(),
        ];
    }

    public static function getValues(): array
    {
        return [
            'pf',
            'pj',
        ];
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PF => 'PF',
            self::PJ => 'PJ',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PF => 'primary',
            self::PJ => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PF => 'heroicon-s-user-circle',
            self::PJ => 'heroicon-s-office-building',
        };
    }
}

