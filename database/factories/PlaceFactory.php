<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Place;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Place::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = $this->randomImage();
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(),

            'city_id'=> City::inRandomOrder()->first()->id,
            'section_id'=> Section::inRandomOrder()->first()->id,
            'images' => json_encode($this->randomImage()),
            'image' => $images[0],
            'website'=> $this->faker->url(),
            'view_rates' => rand(0,1),
            'rates' => rand(0,5),
            'is_top' => rand(0,1),
            'keywords' => implode(',',$this->faker->words(rand(2,10))),
        ];
    }

    public function randomImage(): array
    {
        $arr = [];
        $count = rand(2,20);
        for ($i = 0; $i < $count; $i++){
            $arr[] = 'https://placekitten.com/g/'.rand(100,300).'/'.rand(100,300);
        }

        return $arr;
    }
}
