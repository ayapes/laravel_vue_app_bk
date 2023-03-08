<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '林家 木久扇',
            'email' => 'kiku@hayashi-ya.com',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '三遊亭 好楽',
            'email' => 'koraku@san-yu-tei.jp',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '三遊亭 小遊三',
            'email' => 'koyuza@san-yu-tei.jp',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '三遊亭 円楽',
            'email' => 'enraku@san-yu-tei.jp',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '春風亭 昇太',
            'email' => 'shota@springwind.com',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '林家 たい平',
            'email' => 'taihei@hayashi-ya.com',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '桂 宮治',
            'email' => 'miyaji@katsura.com',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '山田 隆夫',
            'email' => 'takao@zabuton.com',
            'password' => 'abc01234',
        ];
        DB::table('users')->insert($param);
    }
}
