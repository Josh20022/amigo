<?php

namespace Database\Factories;

use App\Models\OfferCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Act>
 */
class ActFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'short_desc' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'act_type' => $this->faker->word(),
            'time_span' => $this->faker->time(),
            'youtube_iframe' => $this->faker->url(),
            'video_tumblr' => $this->faker->imageUrl(),
            'offer_category_id' => OfferCategory::factory(),
        ];
    }
}
