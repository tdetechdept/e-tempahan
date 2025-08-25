<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $count = (int) $this->command->ask('How many users would you like to create?[DEFAULT 0]', 0);

        for ($i = 0; $i < $count; $i++) {
            $user = User::create([
                'name'           => $faker->name,
                'email'          => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'position'       => $faker->jobTitle,
                'grade'          => 'FA' . rand(31, 35),
                'section'        => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                'department'     => $faker->randomElement(['Account Devision', 'Human Resources', 'Client Relations', 'Sales Devision', 'Marketing Devision', 'Technical Support']),
                'office_number'   => $faker->phoneNumber,
                'phone_number'   => $faker->e164PhoneNumber,
                'status'         => $faker->randomElement(['0', '1', '2']),
                'password'       => '123456',
            ]);

            $user->assignRole('User');
        }

        $this->command->info("Successfully created {$count} users.");
    }
}
