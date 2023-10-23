<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domain\Customer\Models\User;
use App\Domain\Orders\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->has(Order::factory()->count(3))->create();

        User::factory()->has(Order::factory()->count(10))->create([
             'first_name' => 'Tech',
             'last_name' => 'Social',
             'email' => 'admin@techsocial.test',
        ]);
    }
}
