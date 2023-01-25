<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClientsClientsInfo;

class ClientsClientsInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'client_id' => 1,
                'client_info_id' => 1,
            ],
            [
                'client_id' => 2,
                'client_info_id' => 2,
            ],
            [
                'client_id' => 3,
                'client_info_id' => 3,
            ],
            [
                'client_id' => 4,
                'client_info_id' => 4,
            ],
            [
                'client_id' => 5,
                'client_info_id' => 5,
            ],
        ];

        foreach ($data as $item) {
            ClientsClientsInfo::create($item);
        }
    }
}
