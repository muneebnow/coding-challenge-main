<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muneeb ur Rehman',
            'email' => 'muneeburrehmanpakistan@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now()
        ]);
        User::factory()->count(220)->create();
    }
}
