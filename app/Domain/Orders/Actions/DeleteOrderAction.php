<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Orders\Models\Order;

class DeleteOrderAction {
    public function execute(Order $order): ?bool {
        return $order->delete();
    }
}
