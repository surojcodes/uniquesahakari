<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@uniquesacos.com',
            'password'=>bcrypt('hrfNypq4La8bQQN'),
        ]);
    }
}