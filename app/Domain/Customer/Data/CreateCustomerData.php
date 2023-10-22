<?php

namespace App\Domain\Customer\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateCustomerData extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $document,
        public string $email,
        public string $phone_number,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public CarbonImmutable $birth_date,
        public string $password,
    ) {
    }
}
