<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SepetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sepets')->insert([
            'urunid'=>'8',
            'urunAdet'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
