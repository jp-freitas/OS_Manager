<?php

use Illuminate\Database\Seeder;
use App\OrderService;

class Order_ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\OrderService::class, 10)->create();
    }
}
