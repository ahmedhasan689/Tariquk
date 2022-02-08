<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city_name' => 'Rafah',
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Khan Younis',
        ]);

        DB::table('cities')->insert([
            'city_name' => 'middel',
        ]);

        DB::table('cities')->insert([
            'city_name' => 'gaza',
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Jabalia',
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Beit Lahia',
        ]);

        DB::table('cities')->insert([
            'city_name' => 'Beit Hanoun',
        ]);
    }
}
