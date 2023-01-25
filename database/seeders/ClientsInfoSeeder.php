<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\ClientsInfo;

class ClientsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients_infos = [
            [
                'name' => 'client1',
                'birth_date' => Carbon::create('1996', '01', '01'),
                'OD_Sph' => 0.0,
                'OD_Cyl' => 0.0,
                'OD_ax' => 0.0,
                'OS_Sph' => 0.0,
                'OS_Cyl' => 0.0,
                'OS_ax' => 0.0,
                'Dpp' => 0,
            ],
            [
                'name' => 'client2',
                'birth_date' => Carbon::create('1997', '01', '01'),
                'OD_Sph' => 0.0,
                'OD_Cyl' => 0.0,
                'OD_ax' => 0.0,
                'OS_Sph' => 0.0,
                'OS_Cyl' => 0.0,
                'OS_ax' => 0.0,
                'Dpp' => 0,
            ],
            [
                'name' => 'client3',
                'birth_date' => Carbon::create('2005', '01', '01'),
                'OD_Sph' => 0.0,
                'OD_Cyl' => 0.0,
                'OD_ax' => 0.0,
                'OS_Sph' => 0.0,
                'OS_Cyl' => 0.0,
                'OS_ax' => 0.0,
                'Dpp' => 0,
            ],
            [
                'name' => 'client4',
                'birth_date' => Carbon::create('1983', '01', '01'),
                'OD_Sph' => 0.0,
                'OD_Cyl' => 0.0,
                'OD_ax' => 0.0,
                'OS_Sph' => 0.0,
                'OS_Cyl' => 0.0,
                'OS_ax' => 0.0,
                'Dpp' => 0,
            ],
            [
                'name' => 'client5',
                'birth_date' => Carbon::create('1976', '01', '01'),
                'OD_Sph' => 0.0,
                'OD_Cyl' => 0.0,
                'OD_ax' => 0.0,
                'OS_Sph' => 0.0,
                'OS_Cyl' => 0.0,
                'OS_ax' => 0.0,
                'Dpp' => 0,
            ],
        ];

        foreach ($clients_infos as $clients_info) {
            ClientsInfo::create($clients_info);
        }
    }
}
