<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
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
        foreach ($types as $name){
            Type::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'is_active' => 'active',
            ]);
        }
    }
}
