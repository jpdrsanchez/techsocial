<?php

namespace App\Domain\Customer\Actions;

use App\Domain\Customer\Data\AuthenticateCustomerData;
use App\Domain\Customer\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ClientAuthenticateCustomerAction {
    public function execute (AuthenticateCustomerData $data): User|RedirectResponse {
        if (Auth::attempt($data->toArray())) {
            request()->session()->regenerate();

            return Auth::user();
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ])->onlyInput('email');
    }
}
