<?php

namespace Database\Factories\Feedback;

use App\Models\Feedback\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_email' => $this->faker->email,
            'message' => $this->faker->text(300),
            'theme_id' => 1,
        ];
    }
}
