<?php

namespace App\Models;

use App\Enums\ProposalStatus;
use App\Enums\StatusAppointment;
use App\Traits\HasAuditColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes, HasAuditColumns;

    protected $fillable = [
        'user_id',
        'pet_id',
        'date',
        'time',
        'created_by',
        'updated_by',
        'status',
        'created_at',
        'updated_at',
        ];
    protected $casts = [
        'status' => StatusAppointment::class,
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pet() {
        return $this->belongsTo(Pet::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service');
    }
}
