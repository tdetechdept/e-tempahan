<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::truncate();
        $count = (int) $this->command->ask('How many booking would you like to create?[DEFAULT 0]', 0);
        $faker = \Faker\Factory::create();
        $equipmentOptions = ['PA System', 'Smartboard', 'Projector'];
        for ($i = 0; $i < $count; $i++) {
            $startDate = $faker->dateTimeBetween('+1 days', '+30 days');
            $endDate = (clone $startDate)->modify('+1 day');
            Booking::create([
                // Applicant Info
                'user_id' => rand(4, 10),
                'meeting_name' => $faker->sentence(3),
                'chairman' => $faker->name,
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'start_time' => $faker->time('H:i'),
                'end_time' => $faker->time('H:i'),
                'number_of_participants' => $faker->numberBetween(10, 100),
                'description' => $faker->paragraph,
                // 'room_id' => rand(1, 3),
                'room_id' => 14, // Assuming room_id 14 is a valid room
                'type' => $faker->randomElement(['Interior', 'External']),
                'status' => rand(1, 5),
                'repetition_type' => $faker->randomElement(['Daily', 'Weekly', null]),
                'repeat_date' => $faker->optional()->date(),
                'room_plan' => $faker->randomElement(['Great Hall', 'Seminar Room', 'Conference Hall']),

                // Secretariat Info
                'secretariat_name' => $faker->name,
                'secretariat_office_phone' => $faker->optional()->phoneNumber,
                'secretariat_mobile_phone' => $faker->phoneNumber,
                'secretariat_email' => $faker->safeEmail,
                // Other Bookings
                'food' => $faker->boolean,
                'catering_name' => $faker->optional()->company,
                'catering_phone' => $faker->optional()->phoneNumber,

                'technical_services' => $faker->boolean,
                'ict_services' => $faker->boolean,
                // Equipment JSON array
                'equipment' => json_encode($faker->randomElements($equipmentOptions, rand(0, 3))),

                'other_requirements' => $faker->boolean,
                'car_number' => $faker->optional()->regexify('[A-Z]{2}-\d{4}'),

                'update_info' => $faker->optional()->sentence,
            ]);
        }
    }
}
