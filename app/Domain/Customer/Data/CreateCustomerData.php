<?php

namespace App\Domain\Customer\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateCustomerData extends Data {
	public function __construct(
        #[Min(3)]
		public string $first_name,
        #[Min(2)]
        public string $last_name,
        #[Regex('/\d{11}/')]
        public string $document,
        #[Email(Email::RfcValidation)]
        public string $email,
        #[Regex('/\+55\d{2}\d{8,9}/')]
        public string $phone_number,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public CarbonImmutable $birth_date,
	) {
	}

    /**
     * Prepares data for validation and DTO pipeline sanitizing the provided values.
     *
     * @param Collection $properties
     *
     * @return Collection
     */
    public static function prepareForPipeline(Collection $properties) : Collection
    {
        $properties->transform(function (mixed $item, string $key) {
            if ($key === 'phone_number') {
                return '+' . preg_replace('/\D/', '', $item);
            }

            if ($key === 'document') {
                return preg_replace('/\D/', '', $item);
            }

            return strip_tags($item);
        });

        return $properties;
    }
}
