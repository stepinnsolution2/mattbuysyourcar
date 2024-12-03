<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarType;
use App\Models\CarYear;
use App\Models\CarModel;

class CarDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toyota = CarType::create(['name' => 'Toyota']);
        $toyota2022 = CarYear::create(['year' => 2022, 'car_type_id' => $toyota->id]);
        $toyota2023 = CarYear::create(['year' => 2023, 'car_type_id' => $toyota->id]);

        CarModel::create(['name' => 'Corolla', 'car_year_id' => $toyota2022->id, 'car_type_id' => $toyota->id]);
        CarModel::create(['name' => 'Camry', 'car_year_id' => $toyota2022->id, 'car_type_id' => $toyota->id]);
        CarModel::create(['name' => 'Highlander', 'car_year_id' => $toyota2023->id, 'car_type_id' => $toyota->id]);

        // Honda Make
        $honda = CarType::create(['name' => 'Honda']);
        $honda2022 = CarYear::create(['year' => 2022, 'car_type_id' => $honda->id]);

        CarModel::create(['name' => 'Civic', 'car_year_id' => $honda2022->id, 'car_type_id' => $honda->id]);
        CarModel::create(['name' => 'Accord', 'car_year_id' => $honda2022->id, 'car_type_id' => $honda->id]);

        // Ford Make
        $ford = CarType::create(['name' => 'Ford']);
        $ford2022 = CarYear::create(['year' => 2022, 'car_type_id' => $ford->id]);
        $ford2023 = CarYear::create(['year' => 2023, 'car_type_id' => $ford->id]);

        CarModel::create(['name' => 'Mustang', 'car_year_id' => $ford2022->id, 'car_type_id' => $ford->id]);
        CarModel::create(['name' => 'F-150', 'car_year_id' => $ford2023->id, 'car_type_id' => $ford->id]);
    }
}
