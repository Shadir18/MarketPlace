<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'application_name' => 'MarketPlace',
            'name' => 'Marketplace Administration',
            'currency' => 'LKR',
            'email' => 'admin@marketplace.com',
            'phone' => '+94 77 123 4567',
            'address' => 'Colombo, Sri Lanka',
            'contacting_hours' => 'Monday - Friday, 9:00 AM - 5:00 PM',
        ]);
    }
}
