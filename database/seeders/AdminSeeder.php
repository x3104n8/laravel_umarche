<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // SHINYA EDIT
use Illuminate\Support\Facades\Hash;  // SHINYA EDIT


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SHINYA ADD START
        DB::table('admins')->insert([
            'name' => 'admin_user99',
            'email' => 'admin_user99@test.com',
            'password' => Hash::make('akagikaga'),
            'created_at' => '2025/3/29',
        ]);
        // SHINYA ADD END
    }
}
