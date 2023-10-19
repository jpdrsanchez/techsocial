<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Data\AuthenticateCustomerData;
use App\Domain\Customer\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthenticateCustomerAction {
    public function execute (AuthenticateCustomerData $data): array {
        $user = User::where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return [
            'token' => $user->createToken('device')->plainTextToken,
            'user' => $user,
        ];
    }
}
