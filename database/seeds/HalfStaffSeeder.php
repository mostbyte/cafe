<?php

use App\HalfStaff;
use Illuminate\Database\Seeder;

class HalfStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HalfStaff::class, 20)->create();

    }
}
