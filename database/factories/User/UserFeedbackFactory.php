<?php

namespace Database\Factories\User;

use App\Models\User\User;
use App\Models\User\UserFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserFeedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'body' => $this->faker->text(300),
            'created_by' => User::factory()->create(),
            'user_id' => User::first(),
        ];
    }
}
