<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;


class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['name' => 'Dewan Serbaguna', 'level' => 'Basement 1', 'capacity' => 400, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],
            ['name' => 'Anjung Kementerian Komunikasi', 'level' => 'Basement 1', 'capacity' => 100, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],
            ['name' => 'Luar Dewan Serbaguna', 'level' => 'Basement 1', 'capacity' => 100, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Caw. Perdagangan', 'level' => 'Aras 3', 'capacity' => 25, 'pic_name' => 'Pn. Fatiha binti Mohd Kadzim Azizi', 'pic_phone' => '03 8911 5137', 'pic_email' => 'fatiha.kadzim@komunikasi.gov.my'],

            ['name' => 'Makmal Komputer', 'level' => 'Aras 4', 'capacity' => 0, 'pic_name' => 'Pn', 'pic_phone' => '03', 'pic_email' => 'email@mail.com'],

            ['name' => 'Bilik Perbincangan 1 / Extra Force', 'level' => 'Aras 7', 'capacity' => 10, 'pic_name' => 'Pn. Emee Aida binti Talib', 'pic_phone' => '03 8911 5865', 'pic_email' => 'emee@komunikasi.gov.my'],
            ['name' => 'Bilik Perbincangan 2', 'level' => 'Aras 7', 'capacity' => 10, 'pic_name' => 'Pn. Noraini binti Mamat', 'pic_phone' => '03 8911 5866', 'pic_email' => 'noraini@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat Bhg Kewangan', 'level' => 'Aras 7', 'capacity' => 45, 'pic_name' => 'Pn. Siti Aishah binti Mokhtar', 'pic_phone' => '03 8911 5870', 'pic_email' => 'aishah@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Caw. Pengurusan Perolehan', 'level' => 'Aras 8', 'capacity' => 22, 'pic_name' => 'Pn. Mimi Rohayu binti Mohamad', 'pic_phone' => '03 8911 7513', 'pic_email' => 'mimirohayu@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat', 'level' => 'Aras 8', 'capacity' => 20, 'pic_name' => 'En. Roslan bin Latif', 'pic_phone' => '03 8911 5625', 'pic_email' => 'roslan@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat', 'level' => 'Aras 19', 'capacity' => 30, 'pic_name' => 'Pn.Nuratikah binti Mat Zin', 'pic_phone' => '03 8911 5004', 'pic_email' => 'atikahmz@komunikasi.gov.my'],
            ['name' => 'Makmal Komputer A', 'level' => 'Aras 19', 'capacity' => 15, 'pic_name' => 'Pn.Nuratikah binti Mat Zin', 'pic_phone' => '03 8911 5004', 'pic_email' => 'atikahmz@komunikasi.gov.my'],
            ['name' => 'Makmal Komputer B', 'level' => 'Aras 19', 'capacity' => 15, 'pic_name' => 'Pn.Nuratikah binti Mat Zin', 'pic_phone' => '03 8911 5004', 'pic_email' => 'atikahmz@komunikasi.gov.my'],
            ['name' => 'Bilik Perbincangan B', 'level' => 'Aras 19', 'capacity' => 7, 'pic_name' => 'Pn.Nuratikah binti Mat Zin', 'pic_phone' => '03 8911 5004', 'pic_email' => 'atikahmz@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Aras 20', 'level' => 'Aras 20', 'capacity' => 20, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat Aras 21', 'level' => 'Aras 21', 'capacity' => 20, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat Aras 22', 'level' => 'Aras 22', 'capacity' => 40, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Makmal Komputer', 'level' => 'Aras 20', 'capacity' => 15, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Bilik Latihan', 'level' => 'Aras 20', 'capacity' => 44, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Bilik Makan', 'level' => 'Aras 20', 'capacity' => 56, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Bilik Temuduga', 'level' => 'Aras 21', 'capacity' => 10, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],
            ['name' => 'Bilik Bincang', 'level' => 'Aras 20', 'capacity' => 8, 'pic_name' => 'Pn. Zamzuliana binti M Nasir', 'pic_phone' => '03 8911 5902', 'pic_email' => 'zamzuliana@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat', 'level' => 'Aras 23', 'capacity' => 40, 'pic_name' => 'Pn. Lydia Yanti binti Muhamad', 'pic_phone' => '03 8911 5348', 'pic_email' => 'lydia@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat PUSPAL', 'level' => 'Aras 24', 'capacity' => 15, 'pic_name' => 'En. Muhammad Billy bin Apat', 'pic_phone' => '03 8911 5366', 'pic_email' => 'billy@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat', 'level' => 'Aras 24', 'capacity' => 20, 'pic_name' => 'En. Danil Faizal bin Baharuddin Amin', 'pic_phone' => '03 8911 5370', 'pic_email' => 'danil@komunikasi.gov.my'],

            ['name' => 'Bilik Bincang', 'level' => 'Aras 24', 'capacity' => 6, 'pic_name' => 'Pn. Nurul Aine binti Abd Aziz', 'pic_phone' => '03 8911 5406', 'pic_email' => 'aine@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Utama', 'level' => 'Aras 25', 'capacity' => 40, 'pic_name' => 'Pn. Norlila binti Aripin', 'pic_phone' => '03 8911 5520', 'pic_email' => 'norlila@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat BKP', 'level' => 'Aras 27', 'capacity' => 15, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Delima 1', 'level' => 'Aras 28', 'capacity' => 54, 'pic_name' => 'Cik Norfazilany binti Ahmad', 'pic_phone' => '03 8911 5783', 'pic_email' => 'norfazilany@komunikasi.gov.my'],
            ['name' => 'Bilik Latihan', 'level' => 'Aras 28', 'capacity' => 20, 'pic_name' => 'Cik Norfazilany binti Ahmad', 'pic_phone' => '03 8911 5783', 'pic_email' => 'norfazilany@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat', 'level' => 'Aras 29', 'capacity' => 40, 'pic_name' => 'Pn. Lydia Yanti binti Muhamad', 'pic_phone' => '03 8911 5348', 'pic_email' => 'lydia@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Utama', 'level' => 'Aras 30', 'capacity' => 41, 'pic_name' => 'Pn. Muhaina binti Othman', 'pic_phone' => '03 8911 5898', 'pic_email' => 'muhaina@komunikasi.gov.my'],
            ['name' => 'Bilik Bincang BKM', 'level' => 'Aras 30', 'capacity' => 10, 'pic_name' => 'Pn. Muhaina binti Othman', 'pic_phone' => '03 8911 5898', 'pic_email' => 'muhaina@komunikasi.gov.my'],
            ['name' => 'Bilik Perbincangan IA', 'level' => 'Aras 30', 'capacity' => 10, 'pic_name' => 'Pn. Rohayu binti Jamal', 'pic_phone' => '03-8911 5607', 'pic_email' => 'rohayu@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat 2', 'level' => 'Aras 31', 'capacity' => 20, 'pic_name' => 'Pn. Nor Ezuana binti A Rahman', 'pic_phone' => '03 8911 5644', 'pic_email' => 'ezuana@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat 1', 'level' => 'Aras 31', 'capacity' => 20, 'pic_name' => 'Pn. Rosaliza binti Adnan', 'pic_phone' => '03 8911 5767', 'pic_email' => 'rosaliza@komunikasi.gov.my'],

            ['name' => 'Bilik Mesyuarat Pengurusan', 'level' => 'Aras 32', 'capacity' => 48, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],
            ['name' => 'Anjung @32', 'level' => 'Aras 32', 'capacity' => 50, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat Utama', 'level' => 'Aras 34', 'capacity' => 50, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],
            ['name' => 'Bilik Mesyuarat Pengurusan', 'level' => 'Aras 34', 'capacity' => 48, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],
            ['name' => 'Dewan Makan', 'level' => 'Aras 34', 'capacity' => 48, 'pic_name' => 'Pn. Haswani binti Noor@Hussin', 'pic_phone' => '03 8911 7810', 'pic_email' => 'haswani@komunikasi.gov.my'],

        ];


        foreach ($rooms as $data) {
            Room::create([
                'room_name' => $data['name'],
                'level' => $data['level'],
                'room_capacity' => $data['capacity'],
                'facilities' => ['fasiliti_1', 'fasiliti_2', 'fasiliti_3'],
                'status' => 1,
                'pic_name' => $data['pic_name'],
                'pic_phone' => $data['pic_phone'],
                'pic_email' => $data['pic_email'],
            ]);
        }
    }
}
