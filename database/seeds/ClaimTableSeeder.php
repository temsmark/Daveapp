<?php

use Illuminate\Database\Seeder;

class ClaimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Faculty::class,50)->create();
        factory(App\Claim::class,5)->create();
        factory(App\Message::class,50)->create();
        factory(App\Unit::class,10)->create();
        factory(App\ClaimAmount::class,5)->create();
        factory(App\Department::class,80)->create();



    }
}
