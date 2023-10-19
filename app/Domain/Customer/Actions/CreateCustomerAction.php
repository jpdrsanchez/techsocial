<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Data\CreateCustomerData;
use App\Domain\Customer\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateCustomerAction
{
    public function execute(CreateCustomerData $data): User
    {
        $user = new User;

        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->document = $data->document;
        $user->phone_number = $data->phone_number;
        $user->birth_date = $data->birth_date;

        $user->save();

        return $user;
    }
}
