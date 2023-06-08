<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries=[
            'Agro Based Industry',
            'Archi/Enggr/Construction',
            'Automobile/Industrial Machine',
            'Bank/Mon-Bank Fin. Institute',
            'Electronics/Consumer Durables',
            'Energy/Power/Fuel',
            'Garments/Textile',
            'Govt./Semi-Govt./Autonomous',
            'Pharmaceuticals',
            'Hospital/Diagnostic Center',
            'Airline/Travel/Tourism',
            'Manufacturing (Light Industry)',
            'Manufacturing (Heavy Industry)',
            'Hotel/Restaurant',
            'Information Technology',
            'Logistics/Transportation',
            'Entertainment/Recreation',
            'Media/Advertising/Event Mgt.',
            'NGO/Development',
            'Real Estate/Development',
            'Wholesale/Retail/Export-Import',
            'Telecommunication',
            'Food & Beverage Industry',
            'Security Service',
            'Fire, Safety & Protection',
        ];

        for ($i=0; $i < count($industries); $i++) { 
            Industry::create([
                'name' => $industries[$i],
            ]);
        }
    }
}
