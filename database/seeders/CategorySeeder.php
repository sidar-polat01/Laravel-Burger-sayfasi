<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $categories=['Genel','Eglence','Bilisim','Gezi','Teknoloji','Saglik','Spor','Gunluk Yasam'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>$category,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

        }
    }
}
