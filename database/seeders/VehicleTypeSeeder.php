<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicletypes = [
            'Car',
            'Van',
            'SUV / Jeep',
            'Crew Cab',
            'Pickup / Double Cab',
            'Bus',
            'Lorry / Tipper',
            'Three Wheel',
            'Tractor',
            'Heavy-Duty',
            'Other',
            'Motorcycle',
            'Bicycles'
        ];

        foreach ($vehicletypes as $name) {
            VehicleType::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'is_active' => true
                ]
            );
        }
    }
}
