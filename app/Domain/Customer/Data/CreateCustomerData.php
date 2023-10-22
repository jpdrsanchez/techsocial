<?php

namespace App\Domain\Customer\Data;

use App\Domain\Customer\Models\User;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\DigitsBetween;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Unique;
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
        #[Digits(11), Numeric, Unique('users', 'document')]
        public string $document,
        #[Email(Email::RfcValidation), Unique('users', 'email')]
        public string $email,
        #[DigitsBetween(12, 13), Numeric]
        public string $phone_number,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d'), DateFormat('Y-m-d')]
        public CarbonImmutable $birth_date,
        #[Password(min: 8, letters: true, mixedCase: true, numbers: true, symbols: true)]
        public string $password,
    ) {
    }
}
