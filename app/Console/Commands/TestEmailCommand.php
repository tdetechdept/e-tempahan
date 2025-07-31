<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email functionality by sending a test registration email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        // Create a test user
        $user = new User([
            'name' => 'Test User',
            'email' => $email,
            'id_number' => '123456789012',
            'position' => 'Test Position',
            'grade' => 'Test Grade',
            'section' => 'Test Section',
            'department' => 'Test Department',
            'office_number' => 'Test Office',
            'phone_number' => '0123456789',
        ]);

        $password = 'testpassword123';

        $this->info('Sending test email to: ' . $email);

        try {
            $subject = 'Test Email - Sistem Tempahan Bilik';
            
            $data = [
                'user' => $user,
                'password' => $password,
                'isSuccess' => true,
            ];

            Mail::send('emails.user-registration', $data, function($message) use ($user, $subject) {
                $message->to($user->email)
                        ->subject($subject);
            });

            $this->info('✅ Test email sent successfully!');
            $this->info('Check your email inbox for the test message.');
            
        } catch (\Exception $e) {
            $this->error('❌ Failed to send test email: ' . $e->getMessage());
            $this->error('Please check your mail configuration in .env file');
        }
    }
} 