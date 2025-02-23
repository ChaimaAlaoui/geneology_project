<?php

namespace Database\Seeders;

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
    \App\Models\User::create([
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('123'), 
    ]);
}
}
