<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ListOrderAction
{
    public function execute(Request $request): Paginator
    {
        $orders = Order::with('customer');

        $request->whenHas('customer', function (string $customer) use ($orders) {

            $orders->whereHas(
                'customer',
                fn ( Builder $query) => $query->where('id', $customer)
            );
        });

        return $orders->simplePaginate(15);
    }
}
