<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
          ['name' => "Addition"],
        );
        Category::create(
          ['name' => "Multiplication"],
        );
        Category::create(
          ['name' => "Subtraction"],
        );
        Category::create(
          ['name' => "Division"],
        );
    }
}
