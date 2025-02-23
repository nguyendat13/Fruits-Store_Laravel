<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'customer'];
        $genders = ['male', 'female', 'other'];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('user')->insert([
                'name' => 'user' . $i,
                'password' => Hash::make('password' . $i), // Hash mật khẩu
                'fullname' => 'Full Name ' . $i, // Truyền giá trị cho fullname
                'gender' => $genders[array_rand($genders)],
                'thumbnail' => 'user-thumbnail-' . $i . '.jpg',
                'email' => 'user' . $i . '@example.com',
                'phone' => '012345678' . $i,
                'address' => 'Address ' . $i,
                'roles' => $roles[array_rand($roles)],
                'created_by' => 1,
                'updated_by' => null, // Chưa được cập nhật
                'status' => [0, 1, 2][array_rand([0, 1, 2])], // Random trạng thái từ mảng [0, 1, 2]
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, // Không bị xóa mềm
                'email_verified_at' => now(), // Thêm giá trị cho cột email_verified_at
            ]);
        }
    }
}
