<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Lifestyle'],
            ['name' => 'Education'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Business'],
            ['name' => 'Finance'],
            ['name' => 'Entertainment'],
            ['name' => 'Sports'],
        ];

        DB::table('categories')->insert($categories);
    }
}
