<?php

namespace App\Livewire;

use App\Enums\ShalomDocumentType;
use App\Enums\ShalomStatusClient;
use App\Enums\ShalomStatusDocument;
use App\Models\CreditAnalysis;
use App\Models\ShalomClient;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ShalomCreditAnalysisCard extends Component
{

    public ?Model $record = null;

    public function mount(?Model $record = null): void
    {
        $this->record = $record;
    }


    public function render()
    {
        return view('livewire.shalom-credit-analysis-card', ['data' => $this->record]);
    }

    public function statusColor()
    {
        return match ($this->getStatus()->value ?? $this->record->status->value) {
            'approved' => '#388E3C', // verde escuro
            'rejected' => '#D32F2F', // vermelho escuro
            default => '#FBC02D', // amarelo dourado
        };
    }

    public function statusIcon()
    {
        return ShalomStatusClient::from($this->getStatus()->value ?? $this->record->status->value)->getIcon();
    }

    public function getStatus()
    {
        $status = $this->record->status;

        if ($status->value === ShalomStatusClient::APPROVED->value) {
            return ShalomStatusClient::APPROVED;
        }

        if ($this->record->documents->where('status', ShalomStatusDocument::REJECTED)->count() > 0) {
            $status = ShalomStatusClient::REJECTED;
        }

        if ($this->record->documents->where('status', ShalomStatusDocument::INELIGIBLE)->count() > 0) {
            $status = ShalomStatusClient::REJECTED;
        }

        return $status;
    }

    public function status()
    {
        $status = $this->getStatus() ?? $this->record->status;

        if ($status->value === ShalomStatusClient::APPROVED->value && $this->record->approved_manually === true) {
            return 'Aprovado Manualmente';

        }
        return ShalomStatusClient::from($status->value ?? $status)->getLabel();
    }

    public function getInfo(): array
    {
        $client = $this->record;
        $creditAnalysis = CreditAnalysis::where('external_client', $client->id)->first();
        $message = [];
        if ($client->approved_manually && $client->status === ShalomStatusClient::APPROVED) {
            $message[] = 'Aprovado Manualmente';
        }

        if ($creditAnalysis === null) {
            $message[] = 'Consulta SPC não realizada';
        }

        foreach ($client->documents->where('status', ShalomStatusDocument::REJECTED) as $documentRejected) {
            $typeName = ShalomDocumentType::from($documentRejected->type->value)->getLabel();
            $message[] = $typeName . ' rejeitada';
        }

        foreach ($client->documents->where('status', ShalomStatusDocument::UNDER_REVIEW) as $documentRejected) {
            $typeName = ShalomDocumentType::from($documentRejected->type->value)->getLabel();
            $message[] = $typeName . ' em análise';
        }

        foreach ($client->documents->where('status', ShalomStatusDocument::INELIGIBLE) as $documentRejected) {
            $typeName = ShalomDocumentType::from($documentRejected->type->value)->getLabel();
            $message[] = $typeName . ' ilegível';
        }

        return $message;
    }


}
