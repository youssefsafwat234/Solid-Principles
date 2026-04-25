<?php

namespace App\Models;

use App\Enums\OrderItemPriceEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productBatch(): BelongsTo
    {
        return $this->belongsTo(ProductBatch::class);
    }

    public function orderToppings(): HasMany
    {
        return $this->hasMany(OrderItemTopping::class);
    }

    public function calculateTotalPrice(): Attribute
    {
        return new Attribute(
            get: function () {
                return OrderItemPriceEnum::from($this->product->type)->calculatePrice($this);
            }
        );
    }
}
