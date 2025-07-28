<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing users and rooms
        $users = User::all();
        $rooms = Room::all();

        // If no users or rooms exist, create some basic ones
        if ($users->isEmpty()) {
            $users = User::factory(3)->create();
        }

        if ($rooms->isEmpty()) {
            // Create some basic rooms if none exist
            $rooms = collect([
                Room::create([
                    'room_name' => 'Bilik Mesyuarat A',
                    'level' => 'Tingkat 1',
                    'room_capacity' => 20,
                    'facilities' => ['Projector', 'Whiteboard', 'Air Conditioning'],
                    'status' => 1
                ]),
                Room::create([
                    'room_name' => 'Bilik Mesyuarat B',
                    'level' => 'Tingkat 2',
                    'room_capacity' => 15,
                    'facilities' => ['TV Screen', 'Whiteboard'],
                    'status' => 1
                ]),
                Room::create([
                    'room_name' => 'Bilik Seminar',
                    'level' => 'Tingkat 3',
                    'room_capacity' => 50,
                    'facilities' => ['Projector', 'Sound System', 'Air Conditioning'],
                    'status' => 1
                ])
            ]);
        }

        // Booking statuses: 1 = New, 2 = Pending, 3 = Approved, 4 = Rejected, 5 = Cancelled by User, 6 = Updated by User, 7 = Confirmed by User
        $statuses = [1, 2, 3, 4, 5, 6, 7];
        
        // Meeting names for variety
        $meetingNames = [
            'Mesyuarat Jawatankuasa Pengurusan',
            'Perbincangan Projek Pembangunan',
            'Latihan Kakitangan Baharu',
            'Mesyuarat Bulanan Jabatan',
            'Perbincangan Strategi Perniagaan',
            'Latihan Keselamatan',
            'Mesyuarat Audit',
            'Perbincangan Bajet Tahunan',
            'Latihan Teknologi',
            'Mesyuarat Pasukan Projek',
            'Perbincangan Polisi Syarikat',
            'Latihan Pematuhan',
            'Mesyuarat Pelanggan',
            'Perbincangan R&D',
            'Latihan Kepimpinan',
            'Temuduga Calon Baharu',
            'Temuduga Jawatan Pengurus',
            'Temuduga Calon Teknikal',
            'Temuduga Calon Pentadbiran',
            'Temuduga Calon IT'
        ];

        // Chairman names
        $chairmen = [
            'Encik Ahmad bin Abdullah',
            'Puan Siti binti Mohamed',
            'Encik Mohd Ali bin Hassan',
            'Puan Fatimah binti Omar',
            'Encik Zulkifli bin Ibrahim',
            'Puan Aminah binti Yusof',
            'Encik Kamal bin Ismail',
            'Puan Noraini binti Ahmad'
        ];

        // Secretariat names
        $secretariats = [
            'Encik Azman bin Omar',
            'Puan Salmah binti Ali',
            'Encik Razak bin Hassan',
            'Puan Mariam binti Ibrahim',
            'Encik Ismail bin Yusof',
            'Puan Zainab binti Omar'
        ];

        // Create 30 bookings
        for ($i = 0; $i < 30; $i++) {
            $user = $users->random();
            $room = $rooms->random();
            
            // Generate random dates (within next 30 days)
            $startDate = Carbon::now()->addDays(rand(1, 30));
            $endDate = $startDate->copy()->addDays(rand(0, 2)); // Same day or next few days
            $startTime = Carbon::createFromTime(rand(8, 17), rand(0, 59), 0);
            $endTime = Carbon::createFromTime(rand(9, 18), rand(0, 59), 0);
            
            // Ensure end time is after start time
            if ($endTime->lte($startTime)) {
                $endTime = $startTime->copy()->addHours(rand(1, 3));
            }

            // Random status with weighted probability (more approved/pending than others)
            $rand = rand(1, 100);
            if ($rand <= 40) {
                $status = 3; // 40% approved
            } elseif ($rand <= 70) {
                $status = 2; // 30% pending
            } elseif ($rand <= 85) {
                $status = 1; // 15% new
            } elseif ($rand <= 95) {
                $status = 4; // 10% rejected
            } else {
                $status = 5; // 5% cancelled
            }

            // Equipment options
            $equipmentOptions = ['PA System', 'Smartboard', 'Projector', 'Whiteboard', 'Sound System'];
            $numEquipment = rand(0, min(3, count($equipmentOptions)));
            $equipment = $numEquipment > 0 ? json_encode(array_rand(array_flip($equipmentOptions), $numEquipment)) : null;

            Booking::create([
                'user_id' => $user->id,
                'meeting_name' => $meetingNames[array_rand($meetingNames)],
                'chairman' => $chairmen[array_rand($chairmen)],
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'start_time' => $startTime->format('H:i:s'),
                'end_time' => $endTime->format('H:i:s'),
                'number_of_participants' => (string)rand(5, 50),
                'description' => 'Mesyuarat untuk membincangkan ' . strtolower($meetingNames[array_rand($meetingNames)]) . ' dengan semua pihak yang terlibat.',
                'room_id' => $room->id,
                'type' => rand(0, 1) ? 'Interior' : 'External',
                'status' => $status,
                'repetition_type' => rand(0, 1) ? null : ['Daily', 'Weekly'][array_rand(['Daily', 'Weekly'])],
                'repeat_date' => rand(0, 1) ? null : Carbon::now()->addDays(rand(1, 7))->format('Y-m-d'),
                'room_plan' => ['Great Hall', 'Seminar Room', 'Conference Hall'][array_rand(['Great Hall', 'Seminar Room', 'Conference Hall'])],
                
                // Secretariat Information
                'secretariat_name' => $secretariats[array_rand($secretariats)],
                'secretariat_office_phone' => '03-' . rand(1000, 9999) . ' ' . rand(1000, 9999),
                'secretariat_mobile_phone' => '01' . rand(10000000, 99999999),
                'secretariat_email' => 'secretariat' . rand(1, 100) . '@example.com',
                
                // Other Bookings
                'food' => rand(0, 1),
                'catering_name' => rand(0, 1) ? 'Catering ' . ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])] : null,
                'catering_phone' => rand(0, 1) ? '03-' . rand(1000, 9999) . ' ' . rand(1000, 9999) : null,
                
                'technical_services' => rand(0, 1),
                'ict_services' => rand(0, 1),
                'equipment' => $equipment,
                
                'other_requirements' => rand(0, 1),
                'car_number' => rand(0, 1) ? 'ABC-' . rand(1000, 9999) : null,
                'update_info' => rand(0, 1) ? 'Maklumat telah dikemas kini pada ' . Carbon::now()->format('d/m/Y') : null,
                'reviews' => rand(0, 1) ? 'Ulasan positif dari peserta' : null,
                
                'created_at' => Carbon::now()->subDays(rand(1, 60)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30))
            ]);
        }

        $this->command->info('BookingSeeder: 30 bookings created successfully!');
    }
}
