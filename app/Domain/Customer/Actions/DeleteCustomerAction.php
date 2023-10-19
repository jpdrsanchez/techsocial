<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Models\User;

class DeleteCustomerAction
{
    public function execute(User $user): ?bool
    {
        return $user->delete();
    }
}
