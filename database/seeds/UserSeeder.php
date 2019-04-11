<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin= User::create([
            'name'=>'admin',
            'email'=>'info@technovation.com.gt',
            'password'=>bcrypt('admin'),
        ]);
    }
}
