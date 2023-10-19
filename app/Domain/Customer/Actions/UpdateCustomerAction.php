<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Data\UpdateCustomerData;
use App\Domain\Customer\Models\User;

class UpdateCustomerAction {
    public function execute(User $user, UpdateCustomerData $data): void {
        $data = collect($data->all());

        $data->each(function (mixed $value, string $key) use ($user) {
            $user->{$key} = $value;
        });

        $user->save();
    }
}
