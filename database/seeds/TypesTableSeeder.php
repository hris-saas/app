<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        DB::table('types')->insert([
            [
              'id' => 1,
              'parent_id' => null,
              'sort_order' => 1,
              'name' => 'Referral',
              'class' => \HRServices\ATS\Eloquent\Applicant\Type::class,
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 2,
              'parent_id' => null,
              'sort_order' => 2,
              'name' => 'Job Portal',
              'class' => \HRServices\ATS\Eloquent\Applicant\Type::class,
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 3,
              'parent_id' => 2,
              'sort_order' => 3,
              'name' => 'MyNimo',
              'class' => \HRServices\ATS\Eloquent\Applicant\Type::class,
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 4,
              'parent_id' => 2,
              'sort_order' => 4,
              'name' => 'JobStreet',
              'class' => \HRServices\ATS\Eloquent\Applicant\Type::class,
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
        config('app.name');
    }
}
