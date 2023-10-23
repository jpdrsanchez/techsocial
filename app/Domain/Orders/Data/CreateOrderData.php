<?php

namespace App\Domain\Orders\Data;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class CreateOrderData extends Data
{
    public function __construct(
        public string $description,
        public int $quantity,
        public int $price
    ) {
    }
}
