<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpecialHoliday;
use App\Models\User;
use Carbon\Carbon;

class SpecialHolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user or create one if none exists
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $holidays = [
            [
                'holiday_name' => 'Hari Raya Aidilfitri',
                'start_date' => '2025-03-30',
                'end_date' => '2025-03-31',
                'notes' => 'Cuti Hari Raya Aidilfitri 1446H',
                'created_by' => $user->id,
                'is_active' => true,
            ],
            [
                'holiday_name' => 'Hari Raya Aidiladha',
                'start_date' => '2025-06-07',
                'end_date' => '2025-06-08',
                'notes' => 'Cuti Hari Raya Aidiladha 1446H',
                'created_by' => $user->id,
                'is_active' => true,
            ],
            [
                'holiday_name' => 'Awal Muharram',
                'start_date' => '2025-07-26',
                'end_date' => '2025-07-26',
                'notes' => 'Tahun Baru Hijrah 1447H',
                'created_by' => $user->id,
                'is_active' => true,
            ],
            [
                'holiday_name' => 'Maulidur Rasul',
                'start_date' => '2025-09-05',
                'end_date' => '2025-09-05',
                'notes' => 'Hari Keputeraan Nabi Muhammad SAW',
                'created_by' => $user->id,
                'is_active' => true,
            ],
            [
                'holiday_name' => 'Hari Wesak',
                'start_date' => '2025-05-13',
                'end_date' => '2025-05-13',
                'notes' => 'Hari Wesak - Cuti Agama Buddha',
                'created_by' => $user->id,
                'is_active' => true,
            ],
        ];

        foreach ($holidays as $holiday) {
            SpecialHoliday::create($holiday);
        }
    }
}
