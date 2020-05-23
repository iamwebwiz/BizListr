<?php

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
        factory(\App\User::class)->create([
            'role' => \App\User::ADMIN_ROLE,
            'name' => 'Administrator',
            'email' => 'admin@bizlistr.com',
        ]);
    }
}
