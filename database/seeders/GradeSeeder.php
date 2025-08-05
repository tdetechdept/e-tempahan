<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chairmen = [
            ['name' => 'Pegawai Tadbir &  Diplomatik','grade' => 'M14' ],
            ['name' => 'Pegawai Tadbir &  Diplomatik','grade' => 'M13' ],
            ['name' => 'Pegawai Tadbir &  Diplomatik','grade' => 'M12' ],
            ['name' => 'Pegawai Tadbir &  Diplomatik','grade' => 'M11' ],
            ['name' => 'Pegawai Tadbir &  Diplomatik','grade' => 'M10' ],
            ['name' => 'Pegawai Tadbir &  Diplomatik','grade' => 'M9' ],

            ['name' => 'Pegawai Penerangan ','grade' => 'S14' ],
            ['name' => 'Pegawai Penerangan ','grade' => 'S13' ],
            ['name' => 'Pegawai Penerangan ','grade' => 'S12' ],
            ['name' => 'Pegawai Penerangan ','grade' => 'S10' ],
            ['name' => 'Pegawai Penerangan ','grade' => 'S9' ],

            ['name' => 'Akauntan','grade' => 'WA13' ],
            ['name' => 'Akauntan','grade' => 'WA12' ],
            ['name' => 'Akauntan','grade' => 'WA12' ],
            ['name' => 'Akauntan','grade' => 'WA10' ],
            ['name' => 'Akauntan','grade' => 'WA10' ],
            ['name' => 'Akauntan','grade' => 'WA9' ],

            ['name' => 'Juruaudit','grade' => 'W14' ],
            ['name' => 'Juruaudit','grade' => 'W13' ],
            ['name' => 'Juruaudit','grade' => 'W12' ],
            ['name' => 'Juruaudit','grade' => 'W10' ],
            ['name' => 'Juruaudit','grade' => 'W9' ],

            ['name' => 'Pegawai Teknologi  Maklumat','grade' => 'F14' ],
            ['name' => 'Pegawai Teknologi  Maklumat','grade' => 'F13' ],
            ['name' => 'Pegawai Teknologi  Maklumat','grade' => 'F12' ],
            ['name' => 'Pegawai Teknologi  Maklumat','grade' => 'F12' ],
            ['name' => 'Pegawai Teknologi  Maklumat','grade' => 'F10' ],
            ['name' => 'Pegawai Teknologi  Maklumat','grade' => 'F9' ],

            ['name' => 'Ketua Pusat Sumber','grade' => 'S12' ],
            ['name' => 'Pustakawan','grade' => 'S12' ],
            ['name' => 'Pegawai Hal Ehwal Islam','grade' => 'S10' ],
            ['name' => 'Pustakawan','grade' => 'S10' ],
            ['name' => 'Pegawai Arkib','grade' => 'S10' ],
            ['name' => 'Pegawai Psikologi','grade' => 'S10' ],
            ['name' => 'Pegawai Psikologi','grade' => 'S9' ],
            ['name' => 'Pustakawan','grade' => 'S9' ],

        ];

        foreach ($chairmen as $data) {
            Grade::create([
                'name' => $data['name'],
                'grade' =>  $data['grade'],
            ]);
        }
    }
}
