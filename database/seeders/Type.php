<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Type extends Seeder
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
    }
}
