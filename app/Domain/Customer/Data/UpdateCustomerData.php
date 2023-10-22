<?php

namespace App\Domain\Customer\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\DigitsBetween;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateCustomerData extends Data
{
    public function __construct(
        #[Sometimes, Min(3)]
        public string|Optional $first_name,
        #[Sometimes, Min(2)]
        public string|Optional $last_name,
        #[Sometimes, Digits(11), Numeric]
        public string|Optional $document,
        #[Sometimes, Email(Email::RfcValidation)]
        public string|Optional $email,
        #[Sometimes, DigitsBetween(12, 13), Numeric]
        public string|Optional $phone_number,
        #[Sometimes, WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d'), DateFormat('Y-m-d')]
        public CarbonImmutable|Optional $birth_date,
        #[Nullable, Password(min: 8, letters: true, mixedCase: true, numbers: true, symbols: true)]
        public null|string|Optional $password,
    ) {
    }
}
