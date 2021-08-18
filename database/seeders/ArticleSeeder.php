<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker :: create ();
        for($i=0;$i<4;$i++){

            DB::table('articles')->insert([
                'category_id'=>rand(1,7),
               'title'=>$faker -> title,
               'image'=>$faker->imageUrl(800, 400, 'cats', true),
               'content'=>$faker -> realText($maxNbChars = 200, $indexSize = 2),
                'slug'=>$faker -> title,
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now()
            ]);
        }
    }
}
