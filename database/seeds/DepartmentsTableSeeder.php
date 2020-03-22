<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRServices\PIM\Eloquent\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', Department::class)->delete();

        DB::table('employee_fields')->insert([
            ['class' => Department::class, 'name' => 'Creative', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Department::class, 'name' => 'Engineering', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Department::class, 'name' => 'Operation', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
