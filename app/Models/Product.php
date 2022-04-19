<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property bool|mixed $is_scanned
 */
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot(['product_id','order_id','quantity']);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
