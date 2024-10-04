<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function userType(): BelongsTo{
        return $this->belongsTo(UserType::class);
    }

    // Relación: Un usuario puede tener muchas donaciones
    public function donations(): HasMany{
        return $this->hasMany(Donation::class);
    }
}
