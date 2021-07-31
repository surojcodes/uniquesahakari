<?php

use Illuminate\Database\Seeder;
use App\Principle;

class PrincipleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Principle::create([
            'text'=>'<p>No Content</p>'
        ]);
    }
}
