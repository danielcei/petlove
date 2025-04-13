<?php

namespace App\Models;

use App\Traits\HasAuditColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasAuditColumns;


    protected $fillable = [
        'name',
        'price',
        'duration_minutes',
        'created_by',
        'updated_by',
        'status',
        'created_at',
        'updated_at',
    ];

    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}
