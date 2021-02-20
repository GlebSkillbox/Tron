<?php

namespace Database\Factories\Feedback;

use App\Models\Feedback\FeedbackTheme;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedbackTheme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Общие вопросы',
        ];
    }
}
