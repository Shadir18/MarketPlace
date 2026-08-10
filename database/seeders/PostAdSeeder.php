<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Model;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PostAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $categories = Category::pluck('id', 'name')->toArray();
        $types = Type::pluck('id', 'name')->toArray();
        $models = Model::pluck('id', 'name')->toArray();

        $postAds = [
            [
                'category' => 'Cars',
                'type'     => 'Car',
                'model'    => 'Toyota',
                'title'    => 'Toyota Prius ZVW30 Safety Package - Mint Condition',
                'year'     => 2014,
                'mileage'  => '98,000 km',
                'price'    => 8200000,
            ],
            [
                'category' => 'Cars',
                'type'     => 'Car',
                'model'    => 'Honda',
                'title'    => 'Honda Civic FK7 Hatchback Turbo',
                'year'     => 2018,
                'mileage'  => '45,000 km',
                'price'    => 13500000,
            ],
            [
                'category' => 'Cars',
                'type'     => 'Car',
                'model'    => 'Suzuki',
                'title'    => 'Suzuki Alto K10 Doctor Owned Low Mileage',
                'year'     => 2015,
                'mileage'  => '62,000 km',
                'price'    => 3450000,
            ],
            [
                'category' => 'Cars',
                'type'     => 'SUV / Jeep',
                'model'    => 'Nissan',
                'title'    => 'Nissan X-Trail NT32 Grandroad 7 Seater',
                'year'     => 2017,
                'mileage'  => '78,000 km',
                'price'    => 12800000,
            ],
            [
                'category' => 'Cars',
                'type'     => 'Car',
                'model'    => 'BMW',
                'title'    => 'BMW 320i M Sport Shadow Line',
                'year'     => 2019,
                'mileage'  => '38,000 km',
                'price'    => 21500000,
            ],

            // --- VANS ---
            [
                'category' => 'Vans',
                'type'     => 'Van',
                'model'    => 'Toyota',
                'title'    => 'Toyota KDH 201 Super GL High Roof',
                'year'     => 2012,
                'mileage'  => '142,000 km',
                'price'    => 11200000,
            ],
            [
                'category' => 'Vans',
                'type'     => 'Van',
                'model'    => 'Nissan',
                'title'    => 'Nissan NV350 Caravan VX Dual A/C',
                'year'     => 2015,
                'mileage'  => '115,000 km',
                'price'    => 9800000,
            ],
            [
                'category' => 'Vans',
                'type'     => 'Van',
                'model'    => 'Suzuki',
                'title'    => 'Suzuki Every DA64 Join Turbo 4WD',
                'year'     => 2016,
                'mileage'  => '72,000 km',
                'price'    => 4100000,
            ],
            [
                'category' => 'Vans',
                'type'     => 'Van',
                'model'    => 'Mazda',
                'title'    => 'Mazda Bongo Van Flat Bed Petrol',
                'year'     => 2011,
                'mileage'  => '130,000 km',
                'price'    => 3850000,
            ],
            [
                'category' => 'Vans',
                'type'     => 'Van',
                'model'    => 'Micro',
                'title'    => 'Micro MPV Junior 7 Seater Family Van',
                'year'     => 2014,
                'mileage'  => '89,000 km',
                'price'    => 2950000,
            ],

            // --- MOTORBIKES ---
            [
                'category' => 'MotorBikes',
                'type'     => 'Motorcycle',
                'model'    => 'Yamaha',
                'title'    => 'Yamaha FZ-S V3 ABS Vintage Edition',
                'year'     => 2021,
                'mileage'  => '18,000 km',
                'price'    => 920000,
            ],
            [
                'category' => 'MotorBikes',
                'type'     => 'Motorcycle',
                'model'    => 'Honda',
                'title'    => 'Honda Hornet 250 Chassis 115 - Mint Condition',
                'year'     => 2003,
                'mileage'  => '54,000 km',
                'price'    => 1650000,
            ],
            [
                'category' => 'MotorBikes',
                'type'     => 'Motorcycle',
                'model'    => 'TVS',
                'title'    => 'TVS Apache RTR 160 4V SmartXonnect',
                'year'     => 2020,
                'mileage'  => '22,000 km',
                'price'    => 780000,
            ],
            [
                'category' => 'MotorBikes',
                'type'     => 'Motorcycle',
                'model'    => 'Bajaj',
                'title'    => 'Bajaj Pulsar 150 Twin Disc',
                'year'     => 2019,
                'mileage'  => '31,000 km',
                'price'    => 690000,
            ],
            [
                'category' => 'MotorBikes',
                'type'     => 'Motorcycle',
                'model'    => 'KTM',
                'title'    => 'KTM Duke 200 ABS Fast Sale',
                'year'     => 2018,
                'mileage'  => '26,000 km',
                'price'    => 1150000,
            ],

            // --- LORRIES ---
            [
                'category' => 'Lorries',
                'type'     => 'Lorry / Tipper',
                'model'    => 'Isuzu',
                'title'    => 'Isuzu Elf NKR Tipper Lorry 10.5ft',
                'year'     => 2011,
                'mileage'  => '165,000 km',
                'price'    => 6400000,
            ],
            [
                'category' => 'Lorries',
                'type'     => 'Lorry / Tipper',
                'model'    => 'Tata',
                'title'    => 'Tata Ace EX Dico Compact Lorry',
                'year'     => 2016,
                'mileage'  => '88,000 km',
                'price'    => 1850000,
            ],
            [
                'category' => 'Lorries',
                'type'     => 'Lorry / Tipper',
                'model'    => 'Mitsubishi',
                'title'    => 'Mitsubishi Canter FE639 Dual Wheel Lorry',
                'year'     => 2008,
                'mileage'  => '190,000 km',
                'price'    => 5200000,
            ],
            [
                'category' => 'Lorries',
                'type'     => 'Lorry / Tipper',
                'model'    => 'Ashok-Leyland',
                'title'    => 'Ashok Leyland Dost Plus Tipper Body',
                'year'     => 2018,
                'mileage'  => '95,000 km',
                'price'    => 3250000,
            ],
            [
                'category' => 'Lorries',
                'type'     => 'Lorry / Tipper',
                'model'    => 'Mahindra',
                'title'    => 'Mahindra Bolero Maxi Truck Plus',
                'year'     => 2017,
                'mileage'  => '102,000 km',
                'price'    => 2750000,
            ],

            // --- THREE WHEELS ---
            [
                'category' => 'Three wheels',
                'type'     => 'Three Wheel',
                'model'    => 'Bajaj',
                'title'    => 'Bajaj RE 4-Stroke Three Wheel - Good Running Condition',
                'year'     => 2015,
                'mileage'  => '68,000 km',
                'price'    => 1250000,
            ],
            [
                'category' => 'Three wheels',
                'type'     => 'Three Wheel',
                'model'    => 'TVS',
                'title'    => 'TVS King Deluxe 200cc EFI Three Wheel',
                'year'     => 2018,
                'mileage'  => '42,000 km',
                'price'    => 1450000,
            ],
            [
                'category' => 'Three wheels',
                'type'     => 'Three Wheel',
                'model'    => 'Piaggio',
                'title'    => 'Piaggio Ape City Diesel Three Wheel',
                'year'     => 2014,
                'mileage'  => '85,000 km',
                'price'    => 980000,
            ],
            [
                'category' => 'Three wheels',
                'type'     => 'Three Wheel',
                'model'    => 'Bajaj',
                'title'    => 'Bajaj Compact 2020 Model Low Mileage',
                'year'     => 2020,
                'mileage'  => '29,000 km',
                'price'    => 1780000,
            ],
            [
                'category' => 'Three wheels',
                'type'     => 'Three Wheel',
                'model'    => 'REVOLT',
                'title'    => 'Revolt Electric 3-Wheel Commercial Passenger',
                'year'     => 2022,
                'mileage'  => '15,000 km',
                'price'    => 1100000,
            ],

            // --- HEAVY DUTY ---
            [
                'category' => 'Heavy Duty',
                'type'     => 'Heavy-Duty',
                'model'    => 'JCB',
                'title'    => 'JCB 3CX Backhoe Loader 4x4 - Fully Serviced',
                'year'     => 2015,
                'mileage'  => '4,500 hrs',
                'price'    => 14800000,
            ],
            [
                'category' => 'Heavy Duty',
                'type'     => 'Heavy-Duty',
                'model'    => 'CAT',
                'title'    => 'Caterpillar 320D Hydraulic Excavator',
                'year'     => 2013,
                'mileage'  => '6,200 hrs',
                'price'    => 22500000,
            ],
            [
                'category' => 'Heavy Duty',
                'type'     => 'Tractor',
                'model'    => 'Massey-Ferguson',
                'title'    => 'Massey Ferguson 240 Tractor with Rotavator',
                'year'     => 2016,
                'mileage'  => '2,800 hrs',
                'price'    => 3800000,
            ],
            [
                'category' => 'Heavy Duty',
                'type'     => 'Heavy-Duty',
                'model'    => 'Komatsu',
                'title'    => 'Komatsu PC130-8 Chain Excavator',
                'year'     => 2014,
                'mileage'  => '5,100 hrs',
                'price'    => 16500000,
            ],
            [
                'category' => 'Heavy Duty',
                'type'     => 'Tractor',
                'model'    => 'John-Deere',
                'title'    => 'John Deere 5050D 50HP 4WD Agricultural Tractor',
                'year'     => 2019,
                'mileage'  => '1,900 hrs',
                'price'    => 4600000,
            ],

            // --- SPARE PARTS ---
            [
                'category' => 'Spare Parts',
                'type'     => 'Other',
                'model'    => 'Toyota',
                'title'    => 'Toyota Axio NKE165 Original Inverter & Hybrid Battery',
                'year'     => 2016,
                'mileage'  => 'Brand New / Reconditioned',
                'price'    => 285000,
            ],
            [
                'category' => 'Spare Parts',
                'type'     => 'Other',
                'model'    => 'Honda',
                'title'    => 'Honda Vezel RU3 Dual Clutch Transmission Box',
                'year'     => 2015,
                'mileage'  => 'Reconditioned',
                'price'    => 420000,
            ],
            [
                'category' => 'Spare Parts',
                'type'     => 'Other',
                'model'    => 'Nissan',
                'title'    => 'Nissan X-Trail T32 Front Shell Assembly & Headlights',
                'year'     => 2017,
                'mileage'  => 'Used Original',
                'price'    => 195000,
            ],
            [
                'category' => 'Spare Parts',
                'type'     => 'Other',
                'model'    => 'Suzuki',
                'title'    => 'Suzuki Wagon R MH34S Complete Steering Rack Assembly',
                'year'     => 2014,
                'mileage'  => 'Reconditioned',
                'price'    => 65000,
            ],
            [
                'category' => 'Spare Parts',
                'type'     => 'Other',
                'model'    => 'Isuzu',
                'title'    => 'Isuzu 4HF1 Complete Engine Unit with Gearbox',
                'year'     => 2010,
                'mileage'  => 'Imported Low Mileage',
                'price'    => 850000,
            ],
        ];

        foreach($postAds as $ad) {
            DB::table('post_ads')->insert([
                'user_id'          => $userIds[array_rand($userIds)],
                'model_id'         => $models[$ad['model']] ?? 'approved',
                'type_id'          => $types[$ad['type']] ?? 'approved',
                'category_id'      => $categories[$ad['category']] ?? 'approved',
                'title'            => $ad['title'],
                'manufacture_year' => $ad['year'],
                'mileage'          => $ad['mileage'],
                'price'            => $ad['price'],
                'status'           => 'approved',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
