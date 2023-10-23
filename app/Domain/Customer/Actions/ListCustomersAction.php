<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Models\User;
use Illuminate\Pagination\Paginator;

class ListCustomersAction
{
    public function execute(): Paginator
    {
        return User::with('orders')->simplePaginate(15);
    }
}
