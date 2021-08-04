<?php

use Illuminate\Database\Seeder;
use App\Information;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'name'=>'Unique Savings and Credit Co-operative Ltd.',
            'email'=>'info@uniquesahakari.com',
            'phone'=>'01-4389441',
            'address'=>'Samakhusi, Kathmandu'
        ]);
    }
}
