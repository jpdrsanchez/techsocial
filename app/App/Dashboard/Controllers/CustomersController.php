<?php

namespace App\App\Dashboard\Controllers;

use App\Domain\Customer\Actions\CreateCustomerAction;
use App\Domain\Customer\Actions\DeleteCustomerAction;
use App\Domain\Customer\Actions\ListCustomersAction;
use App\Domain\Customer\Actions\UpdateCustomerAction;
use App\Domain\Customer\Data\CreateCustomerData;
use App\Domain\Customer\Data\UpdateCustomerData;
use App\Domain\Customer\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CustomersController {
    public function __construct(
        public ListCustomersAction $listCustomersAction,
        public CreateCustomerAction $createCustomerAction,
        public UpdateCustomerAction $updateCustomerAction,
        public DeleteCustomerAction $deleteCustomerAction
    ) {
    }

	public function index(): View {
        $customers = $this->listCustomersAction->execute();

        return view('customers.index', ['customers' => $customers]);
	}

	public function create(): View {
        return view('customers.create');
	}

	public function store( CreateCustomerData $request ): RedirectResponse {
        $this->createCustomerAction->execute($request);

        return redirect()
            ->route('web.dashboard.customers.index')
            ->with('status', 'customer created successfully');
	}

	public function edit( User $customer ): View {
        return view('customers.edit', ['customer' => $customer]);
	}

	public function update( UpdateCustomerData $request, User $customer ): RedirectResponse {
        $this->updateCustomerAction->execute($customer, $request);

        return redirect()
            ->route('web.dashboard.customers.index')
            ->with('status', 'customer updated successfully');
	}

	public function destroy( User $customer ): RedirectResponse {
        $this->deleteCustomerAction->execute($customer);

        return redirect()
            ->route('web.dashboard.customers.index')
            ->with('status', 'Customer removed successfully');
	}
}
