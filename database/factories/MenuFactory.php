<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $timezone = ['朝食', '昼食', '夕食'];
        $category = ['和食', '洋食', '中華', 'アジア', 'カレー', '焼肉', '鍋', 'その他'];

        return [
            'timezone' => $this->faker->randomElement($timezone),
            'category' => $this->faker->randomElement($category),
            'dish_name' => $this->faker->word(),
            'memo' => $this->faker->realText(),
            'url' => $this->faker->url(),
        ];
    }
}
