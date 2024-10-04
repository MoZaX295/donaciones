<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
    use HasFactory;
    public function donations():HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
