<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(StepsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(JobTitlesTableSeeder::class);
        $this->call(ApplicantsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(MaritalStatusesTableSeeder::class);
    }
}
