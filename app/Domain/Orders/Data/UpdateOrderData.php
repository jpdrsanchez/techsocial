<?php

namespace App\Domain\Orders\Data;

use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;

class UpdateOrderData extends Data
{
    public function __construct(
        public string|Optional $description,
        public int|Optional $quantity,
        public int|Optional $price
    ) {
    }
}
