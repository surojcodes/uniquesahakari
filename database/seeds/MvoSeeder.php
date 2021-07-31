<?php

use Illuminate\Database\Seeder;
use App\Mvo;

class MvoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mvo::create([
            'text'=>'<p>No Content</p>'
        ]);
    }
}
