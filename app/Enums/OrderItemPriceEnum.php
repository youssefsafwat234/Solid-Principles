<?php

namespace App\Enums;

use App\Actions\OrderItem\BatchOrderItemPrice;
use App\Actions\OrderItem\StandardOrderItemPrice;
use App\Actions\OrderItem\ToppingOrderItemPrice;
use App\Models\OrderItem;

enum OrderItemPriceEnum: string
{
    case Standard = 'standard';
    case Has_Toppings = 'has_toppings';

    case Has_Batch = 'has_batch';


    public function calculatePrice(OrderItem $orderItem): float
    {
        return match ($this) {
            self::Standard => new StandardOrderItemPrice()->calculatePrice($orderItem),
            self::Has_Toppings => new ToppingOrderItemPrice()->calculatePrice($orderItem),
            self::Has_Batch => new BatchOrderItemPrice()->calculatePrice($orderItem),
        };
    }
}
