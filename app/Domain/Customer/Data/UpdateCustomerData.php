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
