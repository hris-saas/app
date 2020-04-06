<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HRis\PIM\Eloquent\Relationship;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_fields')->where('class', Relationship::class)->delete();

        DB::table('employee_fields')->insert([
            ['class' => Relationship::class, 'name' => 'Spouse', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Relationship::class, 'name' => 'Mother', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Relationship::class, 'name' => 'Father', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Relationship::class, 'name' => 'Brother', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['class' => Relationship::class, 'name' => 'Sister', 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
