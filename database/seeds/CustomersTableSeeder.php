<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            $customer = new Customer();
            $customer->id = $i;
            $customer->name = "customer$i ";
            $customer->email = "customer$i@codegym.vn";
            $customer->city_id = 1;
            $customer->save();
        }
    }
}
