<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // ...existing seeders...
            ProductSeeder::class,
        ]);

        User::create([
            'name' => 'Sales',
            'email' => 'sales@sales.com',
            'password' => bcrypt('password'),
            'address' => 'Sales Address',
            'phone' => '1234567890',
            'role' => 'sales',
        ]);

        //manager
        User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('password'),
            'address' => 'Manager Address',
            'phone' => '1234567891',
            'role' => 'manager',
        ]);
    }
}
