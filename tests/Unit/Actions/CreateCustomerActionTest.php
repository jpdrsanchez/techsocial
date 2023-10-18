<?php

use App\Domain\Customer\Actions\CreateCustomerAction;
use App\Domain\Customer\Data\CreateCustomerData;
use App\Domain\Customer\Models\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->action = new CreateCustomerAction();
    $this->payload = CreateCustomerData::validateAndCreate([
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'document' => fake()->numerify('###########'),
        'email' => fake()->safeEmail(),
        'phone_number' => fake()->numerify('#############'),
        'birth_date' => fake()->date(),
        'password' => 'Dummy@1235'
    ]);
});

it('should be able to create a new valid customer', function () {
    $customer = $this->action->execute($this->payload);
    expect($customer)
        ->toBeInstanceOf( User::class)
        ->and(Hash::check($this->payload->password, $customer->password))
        ->toBeTrue();
});
