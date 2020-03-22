<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRServices\PIM\Eloquent\PayType;

class PayTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', PayType::class)->delete();

        DB::table('employee_fields')->insert(
            [
                ['class' => PayType::class, 'name' => 'Salary', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['class' => PayType::class, 'name' => 'Hourly', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['class' => PayType::class, 'name' => 'Commission', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
