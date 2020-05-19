<?php

namespace App\Listeners;

use UsersTableSeeder;
use PayTypesTableSeeder;
use DivisionsTableSeeder;
use EmployeesTableSeeder;
use JobTitlesTableSeeder;
use LocationsTableSeeder;
use PayPeriodsTableSeeder;
use DepartmentsTableSeeder;
use RelationshipsTableSeeder;
use MaritalStatusesTableSeeder;
use EmploymentStatusesTableSeeder;
use TerminationReasonsTableSeeder;
use EmployeeEmploymentStatusesTableSeeder;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;

class ConfigureTenantSeeds
{
    public function handle(ConfigureSeeds $event)
    {
        $event->seed(UsersTableSeeder::class);
        $event->seed(DepartmentsTableSeeder::class);
        $event->seed(LocationsTableSeeder::class);
        $event->seed(MaritalStatusesTableSeeder::class);
        $event->seed(JobTitlesTableSeeder::class);
        $event->seed(DivisionsTableSeeder::class);
        $event->seed(TerminationReasonsTableSeeder::class);
        $event->seed(PayPeriodsTableSeeder::class);
        $event->seed(PayTypesTableSeeder::class);
        $event->seed(EmploymentStatusesTableSeeder::class);
        $event->seed(EmployeesTableSeeder::class);
        $event->seed(EmployeeEmploymentStatusesTableSeeder::class);
        $event->seed(RelationshipsTableSeeder::class);
    }
}
