<?php

use App\Domain\Customer\Data\CreateCustomerData;
use Spatie\LaravelData\Data;

uses(Tests\TestCase::class);

it('should be able to create a valid customer creation data transfer object', function (array $payload) {
    $data = CreateCustomerData::from($payload);
    expect($data)
        ->toBeInstanceOf(Data::class)
        ->and($data->phone_number)
        ->toBe('+'.preg_replace('/\D/', '', $payload['phone_number']))
        ->and($data->document)
        ->toBe(preg_replace('/\D/', '', $payload['document']));
})->with([
    fn () => [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'document' => fake()->numerify('###.###.###-##'),
        'email' => fake()->safeEmail(),
        'phone_number' => fake()->numerify('+55 (##) # ####-####'),
        'birth_date' => fake()->date(),
    ],
    fn () => [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'document' => fake()->numerify('###########'),
        'email' => fake()->safeEmail(),
        'phone_number' => fake()->numerify('#############'),
        'birth_date' => fake()->date(),
    ],
]);
