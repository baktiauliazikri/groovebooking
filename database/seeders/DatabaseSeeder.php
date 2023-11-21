<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin Groove',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Admin'
        ]);

        User::create([
            'name' => 'Barberman',
            'email' => 'barberman@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Barberman'
        ]);

        User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Pelanggan'
        ]);
    }
}
