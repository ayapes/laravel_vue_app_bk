<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [

            'book_id' => '1',
            'user_id' => '6',
            'loan_date' => '2023-02-01',
            'return_date' => '2023-02-10',

        ];
        DB::table('loans')->insert($param);

        $param = [

            'book_id' => '2',
            'user_id' => '1',
            'loan_date' => '2022-02-01',
            'return_date' => '2022-02-10',

        ];
        DB::table('loans')->insert($param);
        $param = [

            'book_id' => '3',
            'user_id' => '2',
            'loan_date' => '2023-01-05',
            'return_date' => '2023-01-10',

        ];
        DB::table('loans')->insert($param);
        $param = [

            'book_id' => '3',
            'user_id' => '5',
            'loan_date' => '2022-11-15',
            'return_date' => '2022-11-23',

        ];
        DB::table('loans')->insert($param);
    }
}
