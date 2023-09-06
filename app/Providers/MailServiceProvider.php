<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\MailSettings;


class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('mail_settings')) {
            $mail = MailSettings::first();
            if ($mail) {
                $config = [
                    'driver'     => $mail->mail_mailer,
                    'host'       => $mail->smtp_mail_host,
                    'port'       => $mail->smtp_mail_port,
                    'encryption' => $mail->smtp_encryption,
                    'username'   => $mail->mail_name,
                    'password'   => $mail->mail_password
                ];
                Config::set('mail', $config);
            }
        }
    }
}
