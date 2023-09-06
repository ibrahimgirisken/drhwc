<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MailSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_settings')->insert([
            [
                'mail_mailer'=>"",
                'smtp_mail_host'=>"",
                'smtp_mail_port'=>"",
                'mail_address'=>"",
                'mail_name'=>"",
                'mail_password'=>"",
                'smtp_encryption'=>"",
                'mail_from_address'=>"",
                'mail_from_name'=>"",
                'created_at'=>\Carbon\Carbon::now()
            ]
        ]);
    }
}
