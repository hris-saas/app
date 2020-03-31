<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRis\PIM\Eloquent\EmploymentStatus;

class EmploymentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', EmploymentStatus::class)->delete();

        DB::table('employee_fields')->insert([
            [
              'sort_order' => 1,
              'class' => EmploymentStatus::class,
              'name' => 'Probation',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'sort_order' => 2,
              'class' => EmploymentStatus::class,
              'name' => 'Regular',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'sort_order' => 3,
              'class' => EmploymentStatus::class,
              'name' => 'Homebased',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
    }
}
