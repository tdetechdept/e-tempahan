<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class CheckEmailConfigCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:check-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check email configuration settings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('📧 Email Configuration Check');
        $this->info('========================');
        
        // Check mail driver
        $driver = config('mail.default');
        $this->info("Mail Driver: {$driver}");
        
        // Check SMTP settings if using SMTP
        if ($driver === 'smtp') {
            $this->info("\nSMTP Configuration:");
            $this->info("Host: " . config('mail.mailers.smtp.host'));
            $this->info("Port: " . config('mail.mailers.smtp.port'));
            $this->info("Username: " . config('mail.mailers.smtp.username'));
            $this->info("Encryption: " . config('mail.mailers.smtp.encryption', 'none'));
        }
        
        // Check from address
        $fromAddress = config('mail.from.address');
        $fromName = config('mail.from.name');
        $this->info("\nFrom Address: {$fromAddress}");
        $this->info("From Name: {$fromName}");
        
        // Check environment variables
        $this->info("\nEnvironment Variables:");
        $this->info("MAIL_MAILER: " . env('MAIL_MAILER', 'not set'));
        $this->info("MAIL_HOST: " . env('MAIL_HOST', 'not set'));
        $this->info("MAIL_PORT: " . env('MAIL_PORT', 'not set'));
        $this->info("MAIL_USERNAME: " . env('MAIL_USERNAME', 'not set'));
        $this->info("MAIL_PASSWORD: " . (env('MAIL_PASSWORD') ? 'set' : 'not set'));
        $this->info("MAIL_ENCRYPTION: " . env('MAIL_ENCRYPTION', 'not set'));
        $this->info("MAIL_FROM_ADDRESS: " . env('MAIL_FROM_ADDRESS', 'not set'));
        $this->info("MAIL_FROM_NAME: " . env('MAIL_FROM_NAME', 'not set'));
        
        // Recommendations
        $this->info("\n💡 Recommendations:");
        if ($driver === 'log') {
            $this->warn("- Using 'log' driver - emails will be written to logs only");
            $this->info("- For production, configure SMTP settings in .env file");
        }
        
        if (!$fromAddress) {
            $this->warn("- MAIL_FROM_ADDRESS not set - emails may not send properly");
        }
        
        if ($driver === 'smtp' && !env('MAIL_PASSWORD')) {
            $this->warn("- SMTP password not set - authentication may fail");
        }
        
        $this->info("\n✅ Configuration check complete!");
    }
} 