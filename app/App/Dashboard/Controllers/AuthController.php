<?php

namespace App\App\Dashboard\Controllers;

use App\Domain\Customer\Actions\ClientAuthenticateCustomerAction;
use App\Domain\Customer\Actions\CreateCustomerAction;
use App\Domain\Customer\Data\AuthenticateCustomerData;
use App\Domain\Customer\Data\CreateCustomerData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController {
    public function __construct(
        public ClientAuthenticateCustomerAction $authenticate,
        public CreateCustomerAction $create,
    ) {
    }

    public function login(): View {
        return view('login');
    }

	public function authenticate(AuthenticateCustomerData $request): RedirectResponse {
        $this->authenticate->execute($request);

        return redirect()->intended('dashboard');
	}

    public function register(): View {
        return view('register');
    }

    public function create(CreateCustomerData $request): RedirectResponse {
        $this->create->execute($request);
        $this->authenticate->execute(AuthenticateCustomerData::from([
            'email' => $request->email,
            'password' => $request->password
        ]));

        return redirect()->intended('dashboard');
    }

    public function logout( Request $request): RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
