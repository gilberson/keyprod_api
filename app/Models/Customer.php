<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static count()
 * @method static select(string $string)
 */
class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
