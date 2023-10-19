<?php

namespace App\Domain\Orders\Data;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CreateOrderData extends Data
{
    public function __construct(
        #[Required]
        public string $description,
        #[Required, IntegerType]
        public int $quantity,
        #[Required, IntegerType]
        public int $price
    ) {
    }
}
