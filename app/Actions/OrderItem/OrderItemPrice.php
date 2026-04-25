<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;

abstract class OrderItemPrice
{
    abstract function calculatePrice(OrderItem $orderItem): float;


}
