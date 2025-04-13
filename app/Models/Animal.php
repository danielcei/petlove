<?php

namespace App\Models;

use App\Traits\HasAuditColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes, HasAuditColumns;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'status',
        'created_at',
        'updated_at',
    ];

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
