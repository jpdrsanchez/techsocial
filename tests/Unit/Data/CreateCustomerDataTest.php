<?php

use App\Domain\Customer\Data\CreateCustomerData;
use Illuminate\Validation\ValidationException;
use Spatie\LaravelData\Data;

it('should be able to create a valid customer creation data transfer object', function () {
    $data = CreateCustomerData::validateAndCreate([
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'document' => fake()->numerify('###########'),
        'email' => fake()->safeEmail(),
        'phone_number' => fake()->numerify('#############'),
        'birth_date' => fake()->date(),
        'password' => 'Dummy@1235',
    ]);
    expect($data)->toBeInstanceOf(Data::class);
});

it('should throwing an exception when the data is invalid', function () {
    expect(fn () => CreateCustomerData::validateAndCreate([
        'first_name' => '',
        'last_name' => null,
        'document' => '',
        'email' => '',
        'phone_number' => '',
        'birth_date' => fake()->date('d/m/Y'),
        'password' => '',
    ]))->toThrow(
        ValidationException::class,
        'The first name field is required. (and 6 more errors)'
    );
});
