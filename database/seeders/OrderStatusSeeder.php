<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OrderStatus::create(['name'=>'New']);
        OrderStatus::create(['name'=>'Pending']);
        OrderStatus::create(['name'=>'Out of Delivery']);
        OrderStatus::create(['name'=>'Delivered']);
        OrderStatus::create(['name'=>'Cancelled']);
    }
}
