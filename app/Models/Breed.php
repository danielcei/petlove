<?php

namespace App\Models;

use App\Traits\HasAuditColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breed extends Model
{
    use HasFactory, SoftDeletes, HasAuditColumns;

    protected $fillable = ['name',
        'animal_id',
        'created_by',
        'updated_by',
        'status',
        'created_at',
        'updated_at',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
