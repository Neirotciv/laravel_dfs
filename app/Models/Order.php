<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

      /**
     * Get the products that owns the order.
     */
    public function product(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
