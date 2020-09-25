<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicants')->delete();

        DB::table('applicants')->insert([
            [
              'id'           => 1,
              'uuid'         => Uuid::uuid4(),
              'first_name'   => 'Juan',
              'middle_name'  => '',
              'last_name'    => 'Tamad',
              'resume_cv'    => 'https://bit.ly/kintanar-cv',
              'job_title_id' => 2,
              'created_at'   => now(),
              'updated_at'   => now(),
            ],
        ]);
    }
}
