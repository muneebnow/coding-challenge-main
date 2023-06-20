<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\NetworkConnection;
use Illuminate\Database\Seeder;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=2;$i<5;$i++){
            NetworkConnection::create([
                'sender_id' => $i,
                'receiver_id'=> 1

            ]);
        }

    }
}
