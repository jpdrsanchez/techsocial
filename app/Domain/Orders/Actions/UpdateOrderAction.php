<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Customer\Models\User;
use App\Domain\Orders\Data\UpdateOrderData;
use App\Domain\Orders\Models\Order;

class UpdateOrderAction {
    public function execute(Order $order, UpdateOrderData $data): void {
        $data = collect($data->all());

        $data->each(function (mixed $value, string $key) use ($order) {
            $order->{$key} = $value;
        });

        $order->save();
    }
}
