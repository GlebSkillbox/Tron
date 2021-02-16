<?php

namespace Database\Seeders;

use App\Models\Feedback\FeedbackTheme;
use Illuminate\Database\Seeder;

class FeedbackThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeedbackTheme::factory()->create();
    }
}
