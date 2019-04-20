<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'email' => 'admin@gmail.com'
            ]
        );
        DB::table('category')->insert(
            [
                'cate_name' => 'Tin tức',
                'cate_slug' => Str::slug('Tin tức'),
                'cate_type' => 2,
                'cate_parent' => 0,
                'cate_status' => 1,
            ]
        );
        DB::table('category')->insert(
            [
                'cate_name' => 'Sản phẩm',
                'cate_slug' => Str::slug('Sản phẩm'),
                'cate_type' => 1,
                'cate_parent' => 0,
                'cate_status' => 1,
            ]
        );
        DB::table('category')->insert(
            [
                'cate_name' => 'Đồng hồ thụy sỹ',
                'cate_slug' => Str::slug('Đồng hồ thụy sỹ'),
                'cate_type' => 1,
                'cate_parent' => 2,
                'cate_status' => 1,
            ]
        );
        DB::table('category')->insert(
            [
                'cate_name' => 'Đồng hồ nam',
                'cate_slug' => Str::slug('Đồng hồ nam'),
                'cate_type' => 1,
                'cate_parent' => 0,
                'cate_status' => 1,
            ]
        );
        DB::table('category')->insert(
            [
                'cate_name' => 'Đồng hồ nữ',
                'cate_slug' => Str::slug('Đồng hồ nữ'),
                'cate_type' => 1,
                'cate_parent' => 0,
                'cate_status' => 1,
            ]
        );
        DB::table('category')->insert(
            [
                'cate_name' => 'Đồng hồ Wenger',
                'cate_slug' => Str::slug('Đồng hồ Wenger'),
                'cate_type' => 1,
                'cate_parent' => 4,
                'cate_status' => 1,
            ]
        );
    }
}
