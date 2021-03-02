<?php

namespace Database\Factories\Page;

use App\Models\Page\Page;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'    => $this->faker->sentence(5),
            'body'     => $this->faker->randomHtml(),
            'uri'      => $this->faker->url,
            'owner_id' => User::first(),
        ];
    }
}
