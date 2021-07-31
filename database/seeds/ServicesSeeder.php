<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'slug'=>'mobile-banking',
            'text'=>'<p>No Content</p>'
        ]);
        Service::create([
            'slug'=>'sms-banking',
            'text'=>'<p>No Content</p>'
        ]);
        Service::create([
            'slug'=>'remittance',
            'text'=>'<p>No Content</p>'
        ]);
        Service::create([
            'slug'=>'other',
            'text'=>'<p>No Content</p>'
        ]);
        Service::create([
            'slug'=>'loan-scheme',
            'text'=>'<p>No Content</p>'
        ]);
        Service::create([
            'slug'=>'saving-scheme',
            'text'=>'<p>No Content</p>'
        ]);
    }
}
