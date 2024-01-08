<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()

    {

                $new_order = new Order();

                $new_order->order_number = '12345677839';
                $new_order->costumer = 'Gianfranco';
                $new_order->email = 'gianfranco@example.com';
                $new_order->costumerAddress = 'via gianfranco';
                $new_order->phoneNumber = '+393456373838';
                $new_order->orderDate = '2023/12/25';
                $new_order->deliveryDate = '2023/12/25';
                $new_order->totalPrice = '20.35';

                $new_order->statusOrder = true;

                $new_order->save();            
    }
    

}
