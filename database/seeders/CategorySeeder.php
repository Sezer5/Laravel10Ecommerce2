<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'parent_Id' => Str::random(10),
            'title' => Str::random(10),
            'description' => Str::random(10),
            'keywords' => Str::random(10),
            'status' => Str::random(10),
            
        ]);
    }
}
