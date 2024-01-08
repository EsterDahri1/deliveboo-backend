<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'restaurant_name', 'price', 'ingredients', 'description', 'cover_image', 'is_available'];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurants(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }



}
