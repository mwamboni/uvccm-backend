<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        NewsCategory::truncate();
        NewsCategory::create(['name' => 'Event', 'status' => true]);
        NewsCategory::create(['name' => 'Updates', 'status' => true]);
        NewsCategory::create(['name' => 'News', 'status' => true]);
        Schema::enableForeignKeyConstraints();
    }
}
