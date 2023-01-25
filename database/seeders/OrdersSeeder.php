<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orders;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'client_id' => 1,
                'client_info_id' => 1,
                'glasses_model' => 'ihfi546',
                'comment' => 'dfjndkfnldkf',
            ],
            [
                'client_id' => 2,
                'client_info_id' => 2,
                'glasses_model' => '23446',
                'comment' => 'dfjndkfnldkf',
            ],
            [
                'client_id' => 3,
                'client_info_id' => 3,
                'glasses_model' => '123456',
                'comment' => 'dfjndkfnldkf',
            ],
            [
                'client_id' => 4,
                'client_info_id' => 4,
                'glasses_model' => '987654',
                'comment' => 'dfjndkfnldkf',
            ],
            [
                'client_id' => 5,
                'client_info_id' => 5,
                'glasses_model' => '456123',
                'comment' => 'dfjndkfnldkf',
            ],
        ];

        foreach ($orders as $order) {
            Orders::create($order);
        }
    }
}
