<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'employee_code'       => 'EMP18190018',
            'username'       => 'Ariel',
            'password'       => Hash::make('edenramoneda'),
            'remember_token' => str_random(10),
        ]);
    }
}
