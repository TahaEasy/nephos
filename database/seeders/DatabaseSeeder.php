<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(4)->sequence(
            [
                'f_name' => 'طاها',
                'l_name' => 'شاملی',
                'email' => 'taha@test.com',
                'is_admin' => 1
            ],
            [
                'f_name' => 'توحید',
                'l_name' => 'شاملی',
                'email' => 'tohid@test.com',
                'is_seller' => 1
            ],
            [
                'f_name' => 'علی',
                'l_name' => 'حمیدی',
                'email' => 'ali@test.com',
                'is_seller' => 1
            ],
            [
                'f_name' => 'رضا',
                'l_name' => 'موسوی',
                'email' => 'reza@test.com',
            ],
        )->create();

        Cart::factory()->count(4)->sequence(
            ['user_id' => 1],
            ['user_id' => 2],
            ['user_id' => 3],
            ['user_id' => 4],
        )->create();
    }
}
