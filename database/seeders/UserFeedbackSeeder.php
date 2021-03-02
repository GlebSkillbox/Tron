<?php

namespace Database\Seeders;

use App\Models\User\UserFeedback;
use Illuminate\Database\Seeder;

class UserFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFeedback::factory()->count(2)->create();
    }
}
