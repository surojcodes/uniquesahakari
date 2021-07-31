<?php

use Illuminate\Database\Seeder;
use App\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'slug'=>'introduction',
            'text'=>'<p>No Content</p>'
        ]);
        About::create([
            'slug'=>'mvo',
            'text'=>'<p>No Content</p>'
        ]);
        About::create([
            'slug'=>'membership',
            'text'=>'<p>No Content</p>'
        ]);
        About::create([
            'slug'=>'principle',
            'text'=>'<p>No Content</p>'
        ]);
    }
}
