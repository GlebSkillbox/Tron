<?php

namespace Database\Seeders;

use App\Models\News\News;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::factory()->count(10)->create();
    }
}
