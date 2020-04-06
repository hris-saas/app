#!/bin/bash

php artisan migrate:fresh
php artisan tenancy:create-tenant tenant1
php artisan tenancy:db:seed --class=DepartmentsTableSeeder --website_id=1
php artisan tenancy:db:seed --class=LocationsTableSeeder --website_id=1
php artisan tenancy:db:seed --class=MaritalStatusesTableSeeder --website_id=1
php artisan tenancy:db:seed --class=JobTitlesTableSeeder --website_id=1
php artisan tenancy:db:seed --class=DivisionsTableSeeder --website_id=1
php artisan tenancy:db:seed --class=TerminationReasonsTableSeeder --website_id=1
php artisan tenancy:db:seed --class=PayPeriodsTableSeeder --website_id=1
php artisan tenancy:db:seed --class=PayTypesTableSeeder --website_id=1
php artisan tenancy:db:seed --class=EmploymentStatusesTableSeeder --website_id=1
php artisan tenancy:db:seed --class=EmployeesTableSeeder --website_id=1
php artisan tenancy:db:seed --class=EmployeeEmploymentStatusesTableSeeder --website_id=1
php artisan tenancy:db:seed --class=RelationshipsTableSeeder --website_id=1
