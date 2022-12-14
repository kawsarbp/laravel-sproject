<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123123)
        ]);

        foreach (range(1,5) as $index)
        {
            User::create([
                'first_name' => fake()->firstName,
                'last_name' => fake()->lastName,
                'email' => fake()->unique()->email,
                'password' => Hash::make(123123)
            ]);
        }
    }
}
