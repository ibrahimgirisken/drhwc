<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'title' => 'dr-hwc',
                'description' => 'dr-hwc',
                'keywords' => 'dr-hwc',
                'logo' => 'logo.png',
                'telephone' => '444 20 02',
                'e-mail' => 'info@dr-hwc.com',
                'address' => 'dr-hwc',
                'facebook' => 'dr-hwc',
                'googleMaps' => 'dr-hwc',
                'instagram' => 'dr-hwc',
                'twitter' => 'dr-hwc',
                'status' => ''
            ]
        ]);
    }
}
