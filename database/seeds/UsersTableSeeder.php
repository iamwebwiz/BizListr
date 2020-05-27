<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Administrator',
            'email' => 'admin@bizlistr.com',
            'role' => User::ADMIN_ROLE,
            'password' => bcrypt('initsng')
        ]);
    }
}
