<?php

use HRis\PIM\Eloquent\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', Location::class)->delete();

        DB::table('employee_fields')->insert([
            ['class' => Location::class, 'name' => 'ST Bldg.', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Location::class, 'name' => 'Main Bldg.', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
