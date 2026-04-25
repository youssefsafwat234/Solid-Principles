<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;

class BatchOrderItemPrice extends OrderItemPrice
{
    public function calculatePrice(OrderItem $orderItem): float
    {
        return ($orderItem->product->price + $orderItem->productBatch->price) * $orderItem->quantity;
    }
}
