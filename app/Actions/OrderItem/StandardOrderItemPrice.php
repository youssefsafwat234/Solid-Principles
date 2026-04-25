<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;

class StandardOrderItemPrice extends OrderItemPrice
{
    public function calculatePrice(OrderItem $orderItem): float
    {
        return $orderItem->product->price * $orderItem->quantity;
    }
}
