<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum StatusAppointment: string implements HasLabel, HasIcon, HasColor
{
    case STATUS_AGENDADO = 'agendado';
    case STATUS_AGUARDANDO = 'aguardando_atendimento';
    case STATUS_EM_ANDAMENTO = 'em_andamento';
    case STATUS_ATENDIMENTO_FINALIZADO = 'atendimento_finalizado';
    case STATUS_DEVOLVIDO = 'pet_devolvido';


    public function getLabel(): ?string
    {
        return match ($this) {
            self::STATUS_AGENDADO => 'Agendado',
            self::STATUS_AGUARDANDO => 'Aguardando Atendimento...',
            self::STATUS_EM_ANDAMENTO => 'Em Andamento...',
            self::STATUS_ATENDIMENTO_FINALIZADO => 'Atendimento Finalizado',
            self::STATUS_DEVOLVIDO => 'Finalizado - Pet Devolvido!',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::STATUS_AGENDADO => 'info',
            self::STATUS_AGUARDANDO => 'danger',
            self::STATUS_EM_ANDAMENTO => 'warning',
            self::STATUS_ATENDIMENTO_FINALIZADO => 'success',
            self::STATUS_DEVOLVIDO => 'gray',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::STATUS_AGENDADO => 'heroicon-o-check-circle',
            self::STATUS_AGUARDANDO => 'heroicon-o-clock',
            self::STATUS_EM_ANDAMENTO => 'heroicon-o-play',
            self::STATUS_ATENDIMENTO_FINALIZADO => 'heroicon-o-check-circle',
            self::STATUS_DEVOLVIDO => 'heroicon-o-check-circle',
        };
    }
}
