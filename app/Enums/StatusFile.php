<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum StatusFile: string implements HasLabel, HasIcon, HasColor
{
    case ENVIADO = 'Enviado';
    case RECEBIDO = 'Recebido';
    case EM_ANALISE = 'Em Análise';
    case EM_ANDAMENTO = 'Em Andamento';
    case FINALIZADO = 'Finalizado';
    case CANCELADO = 'Cancelado';

    public static function getValues(): array
    {
        return [
            'Enviado',
            'Recebido',
            'Em Análise',
            'Em Andamento',
            'Finalizado',
            'Cancelado',
        ];
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ENVIADO => __('Enviado'),
            self::RECEBIDO => __('Recebido'),
            self::EM_ANALISE => __('Em Análise'),
            self::EM_ANDAMENTO => __('Em Andamento'),
            self::FINALIZADO => __('Finalizado'),
            self::CANCELADO => __('Cancelado'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ENVIADO => 'info',
            self::RECEBIDO => 'warning',
            self::EM_ANALISE => 'info',
            self::EM_ANDAMENTO => 'info',
            self::FINALIZADO => 'success',
            self::CANCELADO => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ENVIADO => 'heroicon-s-paper-airplane',
            self::RECEBIDO => 'heroicon-s-arrow-down-circle',
            self::EM_ANALISE => 'heroicon-s-magnifying-glass',
            self::EM_ANDAMENTO => 'heroicon-s-arrow-path',
            self::FINALIZADO => 'heroicon-s-check-circle',
            self::CANCELADO => 'heroicon-s-x-circle',
        };
    }
}
