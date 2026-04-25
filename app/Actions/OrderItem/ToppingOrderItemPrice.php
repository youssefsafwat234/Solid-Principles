<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;

class ToppingOrderItemPrice extends OrderItemPrice
{
    public function calculatePrice(OrderItem $orderItem): float
    {
        return $orderItem->orderToppings->reduce(function ($sum, $topping) {
            return ($sum + $topping->product->price) * $topping->quantity;
        }, 0);
    }
}
