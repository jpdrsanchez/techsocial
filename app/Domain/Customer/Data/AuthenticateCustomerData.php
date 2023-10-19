<?php

namespace App\Domain\Customer\Data;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class AuthenticateCustomerData extends Data {
	public function __construct(
        #[Email(Email::RfcValidation)]
        public string $email,
        #[Required]
        public string $password,
	) {
	}
}
