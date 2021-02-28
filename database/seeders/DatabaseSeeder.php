<?php

namespace Database\Seeders;

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
        $this->call(DepartmentsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(MaritalStatusesTableSeeder::class);
        $this->call(JobTitlesTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(TerminationReasonsTableSeeder::class);
        $this->call(PayPeriodsTableSeeder::class);
        $this->call(PayTypesTableSeeder::class);
        $this->call(EmploymentStatusesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(EmployeeEmploymentStatusesTableSeeder::class);
        $this->call(RelationshipsTableSeeder::class);

        $this->call(ApprovalStatusesTableSeeder::class);
    }
}
