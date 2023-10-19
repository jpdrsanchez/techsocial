<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Customer\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListOrderAction
{
    public function execute(User $customer): Collection
    {
        $customer->load('orders');

        return $customer->orders;
    }
}
