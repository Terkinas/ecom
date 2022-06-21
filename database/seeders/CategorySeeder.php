<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()->times(1)->create();

        $categories = [
            ['name' => 'Apranga', 'created_at' => now()],
            ['name' => 'Elektronika', 'created_at' => now()],
            ['name' => 'Verslui', 'created_at' => now()],
            ['name' => 'Nepriskirti', 'created_at' => now()],
            // ['name' => 'Gyvūnai', 'created_at' => now()],
            // ['name' => 'Maikutės', 'created_at' => now()],
            // ['name' => 'Batai', 'created_at' => now()],
            // ['name' => 'Įrankiai', 'created_at' => now()],
        ];

        Category::insert($categories);
    }
}
