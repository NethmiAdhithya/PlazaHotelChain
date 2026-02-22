<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create manager
        User::create([
            'name' => 'Hotel Manager',
            'email' => 'manager@plazahotel.com',
            'phone' => '1234567890',
            'role' => 'manager',
            'password' => Hash::make('manager123'),
        ]);

        // Create reservation clerk
        User::create([
            'name' => 'Reservation Clerk',
            'email' => 'clerk@plazahotel.com',
            'phone' => '0987654321',
            'role' => 'reservation_clerk',
            'password' => Hash::make('clerk123'),
        ]);
    }
}