<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRServices\PIM\Eloquent\JobTitle;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', JobTitle::class)->delete();

        DB::table('employee_fields')->insert([
            [
              'sort_order' => 1,
              'class' => JobTitle::class,
              'name' => 'Frontend Engineer',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'sort_order' => 2,
              'class' => JobTitle::class,
              'name' => 'Backend Engineer',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'sort_order' => 3,
              'class' => JobTitle::class,
              'name' => 'ERP Engineer',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'sort_order' => 4,
              'class' => JobTitle::class,
              'name' => 'UI/UX Designer',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'sort_order' => 5,
              'class' => JobTitle::class,
              'name' => 'QA Engineer',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
    }
}
