<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRServices\PIM\Eloquent\Division;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', Division::class)->delete();

        DB::table('employee_fields')->insert(
            [
                ['class' => Division::class, 'name' => 'Development', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
