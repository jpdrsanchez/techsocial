<?php

namespace App\App\Dashboard\Orders\Controllers;

use App\App\Dashboard\Orders\Requests\StoreOrderRequest;
use App\App\Dashboard\Orders\Requests\UpdateOrderRequest;
use App\Domain\Orders\Actions\CreateOrderAction;
use App\Domain\Orders\Actions\DeleteOrderAction;
use App\Domain\Orders\Actions\ListOrderAction;
use App\Domain\Orders\Actions\UpdateOrderAction;
use App\Domain\Orders\Data\CreateOrderData;
use App\Domain\Orders\Data\UpdateOrderData;
use App\Domain\Orders\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController
{
    public function __construct(
        public ListOrderAction $listOrderAction,
        public CreateOrderAction $createOrderAction,
        public UpdateOrderAction $updateOrderAction,
        public DeleteOrderAction $deleteOrderAction
    ) {
    }

    public function index(Request $request): View
    {
        $orders = $this->listOrderAction->execute($request);

        return view('orders.index', ['orders' => $orders]);
    }

    public function create(): View
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $this->createOrderAction->execute($request->user(), CreateOrderData::from($request->validated()));

        return redirect()
            ->route('web.dashboard.orders.index')
            ->with('status', 'order created successfully');
    }

    public function edit(Order $order): View
    {
        return view('orders.edit', ['order' => $order]);
    }

    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $this->updateOrderAction->execute($order, UpdateOrderData::from($request->validated()));

        return redirect()
            ->route('web.dashboard.orders.index')
            ->with('status', 'order updated successfully');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $this->deleteOrderAction->execute($order);

        return redirect()
            ->route('web.dashboard.orders.index')
            ->with('status', 'Order removed successfully');
    }
}
