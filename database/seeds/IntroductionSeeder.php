<?php

use Illuminate\Database\Seeder;
use App\Introduction;
class IntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Introduction::create([
            'text'=>'<p>No Content</p>'
        ]);
    }
}
