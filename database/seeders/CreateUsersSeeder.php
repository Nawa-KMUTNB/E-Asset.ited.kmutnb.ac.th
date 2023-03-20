<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'is_admin' => "1",
                'password' => bcrypt('VG.aXn)H^9'),
                'num_position' => '1234',
                'position' => 'เจ้าหน้าที่พัสดุ',
                'department' => 'พัสดุ',
                'other_department' => ' ',
                'task' => 'งานพัสดุ'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
