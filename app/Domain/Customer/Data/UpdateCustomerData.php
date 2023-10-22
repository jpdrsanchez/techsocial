<?php

namespace App\Domain\Customer\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateCustomerData extends Data
{
    public function __construct(
        public string|Optional $first_name,
        public string|Optional $last_name,
        public string|Optional $document,
        public string|Optional $email,
        public string|Optional $phone_number,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public CarbonImmutable|Optional $birth_date,
        public null|string|Optional $password,
    ) {
    }
}
