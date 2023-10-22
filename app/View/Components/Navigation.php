<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * The navigation menu items.
     */
    protected Collection $items;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->items = collect([
            (object) [
                'title' => 'Users',
                'icon' => 'user-group.svg',
                'links' => route('web.dashboard.customers.index'),
            ],
            (object) [
                'title' => 'Orders',
                'icon' => 'document-chart-bar.svg',
                'links' => '',
            ],
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation', ['items' => $this->items]);
    }
}
