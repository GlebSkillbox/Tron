<?php

namespace Database\Factories\News;

use App\Models\News\News;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'      => $this->faker->unique()->text('20'),
            'content'    => $this->faker->text('300'),
            'date'       => $this->faker->dateTime,
            'created_by' => User::first(),
        ];
    }
}
