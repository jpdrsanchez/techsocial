<?php

namespace App\Domain\Orders\Data;

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
