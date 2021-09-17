<?php

namespace Database\Seeders;

use App\Models\FlightType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FlightTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Pasajero',
            'Cargo',
            'Emergencia',
            'V.I.P.',
        ];

        foreach ($types as $key => $type) {
            FlightType::updateOrCreate(
                [ 'description' => $type ],
                [ 
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), ]);
        }
    }
}
