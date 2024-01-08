<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'cover_image', 'name', 'address', 'vat'];

    public function typologies(): BelongsToMany
    {
        return $this->belongsToMany(Typology::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
