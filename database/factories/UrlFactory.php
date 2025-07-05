<?php

namespace Database\Factories;

use App\Models\Url;
use App\Services\ShortCodeGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    protected $model = Url::class;

    public function definition(): array
    {
        return [
            'short_code' => app(ShortCodeGenerator::class)->generate(),
            'long_url' => $this->faker->url(),
        ];
    }
}
