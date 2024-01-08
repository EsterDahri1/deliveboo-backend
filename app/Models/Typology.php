<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Typology extends Model
{
    use HasFactory;

    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
