<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id'                => 1,
                'name'              => 'Bertrand Kintanar',
                'email'             => 'bertrand.kintanar@gmail.com',
                'email_verified_at' => null,
                'password'          => '$2y$10$2igFKo3ThJNeTPsGzf1/k.G4TX2OlH0wP8HE/qgUzNtva0RLh4iTy',
                'remember_token'    => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
