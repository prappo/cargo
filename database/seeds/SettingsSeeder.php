<?php

use App\Setting;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
            'theme' => 'skin-red-light',
        ]);

        Setting::create([
            'userId' => User::where('email', 'admin@email.com')->value('id')
        ]);

        \App\Package::create([
            'userId' => User::where('email', 'admin@email.com')->value('id')
        ]);

        \App\SoftwareSettings::create(['key' => 'name']);
        \App\SoftwareSettings::create(['key' => 'logo']);
        \App\SoftwareSettings::create(['key' => 'footerText']);
        \App\SoftwareSettings::create(['key' => 'footerTextLink']);
        \App\SoftwareSettings::create(['key' => 'footerVersion']);
    }
}
