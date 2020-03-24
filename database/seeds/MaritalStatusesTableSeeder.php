<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRis\PIM\Eloquent\MaritalStatus;

class MaritalStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', MaritalStatus::class)->delete();

        DB::table('employee_fields')->insert(
            [
                ['class' => MaritalStatus::class, 'name' => 'Single', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['class' => MaritalStatus::class, 'name' => 'Married', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['class' => MaritalStatus::class, 'name' => 'Other', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
