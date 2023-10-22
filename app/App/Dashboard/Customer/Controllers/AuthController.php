<?php

namespace App\App\Dashboard\Customer\Controllers;

use App\App\Dashboard\Customer\Requests\AuthenticateCustomerRequest;
use App\App\Dashboard\Customer\Requests\StoreCustomerRequest;
use App\Domain\Customer\Actions\ClientAuthenticateCustomerAction;
use App\Domain\Customer\Actions\CreateCustomerAction;
use App\Domain\Customer\Data\AuthenticateCustomerData;
use App\Domain\Customer\Data\CreateCustomerData;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function __construct(
        public ClientAuthenticateCustomerAction $authenticate,
        public CreateCustomerAction $create,
    ) {
    }

    public function login(): View
    {
        return view('login');
    }

    public function authenticate(AuthenticateCustomerRequest $request): RedirectResponse
    {
        $this->authenticate->execute(AuthenticateCustomerData::from($request));

        return redirect()->intended('dashboard');
    }

    public function register(): View
    {
        return view('register');
    }

    public function create(StoreCustomerRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->create->execute(CreateCustomerData::from($validated));

        $this->authenticate->execute(AuthenticateCustomerData::from([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]));

        return redirect()->intended('dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
