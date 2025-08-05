<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            'Pegawai Tadbir & Diplomatik',
            'Pegawai Penerangan',
            'Akauntan',
            'Juruaudit',
            'Pegawai Teknologi Maklumat',
            'Ketua Pusat Sumber',
            'Pustakawan',
            'Pegawai Hal Ehwal Islam',
            'Pegawai Arkib',
            'Pegawai Psikologi',
        ];

        // Use unique entries only
        $departments = array_unique($departments);

        foreach ($departments as $name) {
            Department::create(['name' => $name]);
        }
    }
}
