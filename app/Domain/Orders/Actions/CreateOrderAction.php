<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Customer\Models\User;
use App\Domain\Orders\Data\CreateOrderData;
use App\Domain\Orders\Models\Order;

class CreateOrderAction
{
    public function execute(User $customer, CreateOrderData $data): false|Order
    {
        $order = new Order;

        $order->description = $data->description;
        $order->price = $data->price;
        $order->quantity = $data->quantity;

        return $customer->orders()->save($order);
    }
}
