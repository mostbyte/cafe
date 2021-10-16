<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::query()->insert([
            'name' => 'Admin',
            'login' => 'admin',
            'role' => 'admin',
            'check_percent' => '0',
            'password' => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(User::class, 4)->create();
    }
}
