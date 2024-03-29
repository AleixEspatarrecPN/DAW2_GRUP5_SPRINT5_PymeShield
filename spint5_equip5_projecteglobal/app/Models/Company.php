<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cif',
        'logo',
        'hidden',
        'removed_reason'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function devices() {
        return $this->hasMany(Devices::class);
    }
}
