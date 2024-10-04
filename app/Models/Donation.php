<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación: Una donación pertenece a un tipo de donación
    public function donationType():BelongsTo
    {
        return $this->belongsTo(DonationType::class);
    }

    // Relación: Una donación pertenece a una región
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
