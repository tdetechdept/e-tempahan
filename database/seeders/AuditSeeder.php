<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OwenIt\Auditing\Models\Audit;
use App\Models\User;
use Carbon\Carbon;

class AuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some existing users or create test users
        $users = User::all();
        
        if ($users->isEmpty()) {
            // Create some test users if none exist
            $users = User::factory(5)->create();
        }

        $auditEvents = ['created', 'updated', 'deleted'];
        $auditableTypes = ['App\Models\User', 'App\Models\Booking', 'App\Models\Room'];
        $departments = ['Bahagian Akaun(BA)', 'Bahagian IT(BIT)', 'Bahagian Pentadbiran(BP)', 'Bahagian Kewangan(BK)'];
        $sections = ['Seksyen 1', 'Seksyen 2', 'Seksyen 3', 'Seksyen 4'];

        // Create 50 audit records
        for ($i = 0; $i < 50; $i++) {
            $user = $users->random();
            $event = $auditEvents[array_rand($auditEvents)];
            $auditableType = $auditableTypes[array_rand($auditableTypes)];
            
            // Generate random old and new values
            $oldValues = json_encode([
                'name' => 'Old Name ' . rand(1, 100),
                'email' => 'old' . rand(1, 100) . '@example.com',
                'department' => $departments[array_rand($departments)],
                'section' => $sections[array_rand($sections)]
            ]);
            
            $newValues = json_encode([
                'name' => 'New Name ' . rand(1, 100),
                'email' => 'new' . rand(1, 100) . '@example.com',
                'department' => $departments[array_rand($departments)],
                'section' => $sections[array_rand($sections)]
            ]);

            Audit::create([
                'user_type' => 'App\Models\User',
                'user_id' => $user->id,
                'event' => $event,
                'auditable_type' => $auditableType,
                'auditable_id' => rand(1, 100),
                'old_values' => $event === 'created' ? null : $oldValues,
                'new_values' => $event === 'deleted' ? null : $newValues,
                'url' => '/admin/' . strtolower(str_replace('App\Models\\', '', $auditableType)),
                'ip_address' => '192.168.' . rand(1, 255) . '.' . rand(1, 255),
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                'tags' => $event === 'created' ? 'new_record' : ($event === 'updated' ? 'modified' : 'deleted'),
                'created_at' => Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ]);
        }

        $this->command->info('Audit records seeded successfully!');
    }
} 