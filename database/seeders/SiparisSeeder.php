<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiparisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siparis')->insert([
            'title'=>'burger',
            'piece'=>3,
            'name'=>'sidar',
            'email'=>'burger@sidar',
            'topic'=>'kredi',
            'message'=>'burger isterim',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
