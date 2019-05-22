<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\App\Models\NhanVien::count() == 0) {
            \App\Models\NhanVien::create([
                'MaNV' => 'admin',
                'HoTen' => 'admin',
                'MatKhau' => bcrypt('123456'),
                'Id_VaiTro' => 1,
            ]);
        }
    }
}
