<?php

use Illuminate\Database\Seeder;
use App\Membership;
class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Membership::create([
            'text'=>'<p>No Content</p>'
        ]);
    }
}
