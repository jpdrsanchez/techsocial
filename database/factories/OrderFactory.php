<?php

namespace Database\Factories;

use App\Domain\Customer\Models\User;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
	protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	public function definition(): array {
		return [
			'description' => fake()->words(asText: true),
			'quantity'    => fake()->randomNumber(),
			'price'       => fake()->randomNumber(),
			'created_at'  => Carbon::now(),
			'updated_at'  => Carbon::now(),
		];
	}
}
