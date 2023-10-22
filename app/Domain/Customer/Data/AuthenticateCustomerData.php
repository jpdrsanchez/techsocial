<?php

namespace App\Domain\Customer\Data;

use Spatie\LaravelData\Data;

class AuthenticateCustomerData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
