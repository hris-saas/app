<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->delete();

        DB::table('employees')->insert([
            [
              'id' => 1,
              'user_id' => 1,
              'department_id' => 2,
              'location_id' => 5,
              'marital_status_id' => 7,
              'first_name' => 'Bertrand',
              'middle_name' => 'Son',
              'last_name' => 'Kintanar',
              'salutation' => 'Mr.',
              'nickname' => 'Bert',
              'employee_no' => '02-1-00238',
              'date_of_birth' => '1985-10-31',
              'salutation' => 'Mr.',
              'identity_no' => '278-992-354-000',
              'gender' => 'm',
              'work_phone' => '+63 32 898 7899',
              'mobile_phone' => '+63 908 987 8856',
              'home_phone' => '+63 32 897 6676',
              'work_email' => 'bertrand@imakintanar.com',
              'personal_email' => 'bertrand.kintanar@gmail.com',
              'is_active' => true,
              'started_at' => '2018-09-25',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
    }
}
