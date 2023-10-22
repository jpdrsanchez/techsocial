<?php

namespace App\Domain\Customer\Data;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class AuthenticateCustomerData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
