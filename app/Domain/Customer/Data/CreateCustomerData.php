<?php

namespace App\Domain\Customer\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\DigitsBetween;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateCustomerData extends Data
{
    public function __construct(
        #[Min(3)]
        public string $first_name,
        #[Min(2)]
        public string $last_name,
        #[Digits(11), Numeric]
        public string $document,
        #[Email(Email::RfcValidation)]
        public string $email,
        #[DigitsBetween(12, 13), Numeric]
        public string $phone_number,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d'), DateFormat('Y-m-d')]
        public CarbonImmutable $birth_date,
    ) {
    }
}
