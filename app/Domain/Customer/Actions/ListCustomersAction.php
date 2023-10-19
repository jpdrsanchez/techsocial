<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ListCustomersAction {
    public function execute(): Collection {
        return User::all();
    }
}
