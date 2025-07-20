<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        //User Permission
        Permission::updateOrCreate(['name' => 'papan_pemuka']);
        Permission::updateOrCreate(['name' => 'profil']);
        Permission::updateOrCreate(['name' => 'profil:kemaskini']);
        Permission::updateOrCreate(['name' => 'profil:kata_laluan']);

        Permission::updateOrCreate(['name' => 'pentadbiran']);
        Permission::updateOrCreate(['name' => 'kalendar']);
        Permission::updateOrCreate(['name' => 'laporan']);
        Permission::updateOrCreate(['name' => 'audit']);
        Permission::updateOrCreate(['name' => 'pengurusan:pengguna']);

        Permission::updateOrCreate(['name' => 'tempahan']);
        Permission::updateOrCreate(['name' => 'tempahan:carian']);
        Permission::updateOrCreate(['name' => 'tempahan:permohonan']);
        Permission::updateOrCreate(['name' => 'tempahan:permohonan:ad-hoc']);
        Permission::updateOrCreate(['name' => 'tempahan:kemaskini']);
        Permission::updateOrCreate(['name' => 'tempahan:pengesahan']);
        Permission::updateOrCreate(['name' => 'tempahan:pembatalan']);
        Permission::updateOrCreate(['name' => 'tempahan:senarai']);
        Permission::updateOrCreate(['name' => 'tempahan:semakan']);

        Permission::updateOrCreate(['name' => 'bilik']);
        Permission::updateOrCreate(['name' => 'bilik:senarai']);
        Permission::updateOrCreate(['name' => 'bilik:penambahan']);
        Permission::updateOrCreate(['name' => 'bilik:kemaskini']);
        Permission::updateOrCreate(['name' => 'bilik:pembatalan']);

        Permission::updateOrCreate(['name' => 'pengguna']);
        Permission::updateOrCreate(['name' => 'pengguna:senarai']);
        Permission::updateOrCreate(['name' => 'pengguna:penambahan']);
        Permission::updateOrCreate(['name' => 'pengguna:kemaskini']);
        Permission::updateOrCreate(['name' => 'pengguna:pembatalan']);


        
        // Create roles and assign created permissions
        $role_superadmin = Role::updateOrCreate(['name' => 'Super Admin'])
            ->syncPermissions([
                'papan_pemuka',
                'profil',
                'profil:kemaskini',
                'profil:kata_laluan',
                
                'pentadbiran',
                'kalendar',
                'laporan',
                'audit',
                'pengurusan:pengguna',

                'tempahan',
                'tempahan:carian',
                'tempahan:permohonan',
                'tempahan:permohonan:ad-hoc',
                'tempahan:kemaskini',
                'tempahan:pengesahan',
                'tempahan:pembatalan',
                'tempahan:senarai',
                'tempahan:semakan',

                'bilik',
                'bilik:senarai',
                'bilik:penambahan',
                'bilik:kemaskini',
                'bilik:pembatalan',

                'pengguna',
                'pengguna:senarai',
                'pengguna:penambahan',
                'pengguna:kemaskini',
                'pengguna:pembatalan',

            ]);

        // Create roles and assign created permissions
        $role_admin = Role::updateOrCreate(['name' => 'Admin'])
            ->syncPermissions([
                'papan_pemuka',
                'profil',
                'profil:kemaskini',
                'profil:kata_laluan',

                'pengurusan:pengguna',

                'tempahan',
                'tempahan:carian',
                'tempahan:permohonan',
                'tempahan:permohonan:ad-hoc',
                'tempahan:kemaskini',
                'tempahan:pengesahan',
                'tempahan:pembatalan',
                'tempahan:senarai',
                'tempahan:semakan',

                'bilik',
                'bilik:senarai',
                'bilik:penambahan',
                'bilik:kemaskini',
                'bilik:pembatalan',
            ]);

        // Create roles and assign created permissions
        $role_user = Role::updateOrCreate(['name' => 'User'])
         ->syncPermissions([
                'papan_pemuka',
                'profil',
                'profil:kemaskini',
                'profil:kata_laluan',

                'tempahan',
                'tempahan:carian',
                'tempahan:permohonan',
                'tempahan:permohonan:ad-hoc',
                'tempahan:kemaskini',
                'tempahan:pengesahan',
                'tempahan:pembatalan',
                'tempahan:senarai',

            ]);

            User::find(1)->assignRole($role_superadmin);
            User::find(2)->assignRole($role_admin);
            User::find(3)->assignRole($role_user);
    }
}
