<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\NetworkConnection;
use Illuminate\Database\Seeder;

class ConnectionInCommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for($i=2;$i<=140;$i++){
            NetworkConnection::create([
                'sender_id' => $i,
                'receiver_id' => ($i % 10) + 1,
                'status' => 'Accepted'
            ]);
        }

    }
}
