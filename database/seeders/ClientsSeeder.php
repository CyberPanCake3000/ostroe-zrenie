<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clients;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'phone_number' => '84552135'
            ],
            [
                'phone_number' => '8948421354'
            ],
            [
                'phone_number' => '8154135482'
            ],
            [
                'phone_number' => '964722364'
            ],
            [
                'phone_number' => '89576455456'
            ],
        ];

        foreach ($clients as $client) {
            Clients::create($client);
        }
    }
}
