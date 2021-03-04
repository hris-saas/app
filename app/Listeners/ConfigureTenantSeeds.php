<?php

namespace App\Listeners;

use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\PayTypesTableSeeder;
use Database\Seeders\DivisionsTableSeeder;
use Database\Seeders\EmployeesTableSeeder;
use Database\Seeders\JobTitlesTableSeeder;
use Database\Seeders\LocationsTableSeeder;
use Database\Seeders\PayPeriodsTableSeeder;
use Database\Seeders\DepartmentsTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RelationshipsTableSeeder;
use Database\Seeders\MaritalStatusesTableSeeder;
use Database\Seeders\ApprovalStatusesTableSeeder;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;
use Database\Seeders\EmploymentStatusesTableSeeder;
use Database\Seeders\TerminationReasonsTableSeeder;
use Database\Seeders\EmployeeEmploymentStatusesTableSeeder;

class ConfigureTenantSeeds
{
    public function handle(ConfigureSeeds $event)
    {
        $event->seed(UsersTableSeeder::class);
        $event->seed(PermissionsTableSeeder::class);
        $event->seed(RolesTableSeeder::class);
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

        $event->seed(ApprovalStatusesTableSeeder::class);
    }
}
