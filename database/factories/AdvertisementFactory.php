<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Place;
use App\Models\Section;
use App\Models\State;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    public function configure()
    {
        return $this->afterCreating(function (Advertisement $advertisement) {

            $count = filter_var($advertisement->name, FILTER_SANITIZE_NUMBER_INT);
            $places  = Place::limit((int)$count)->pluck('id');
            $advertisement->places()->sync($places);

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $type = collect([
            'افضل',
            'احسن',
            'ارخص',
            'اغلى',
        ]);
        $sections = Section::all()->pluck('name');
        $states = State::all()->pluck('name');
        $count = rand(4, 20);


        $name = $type->random().' '. $count .' ' . $sections->random() . ' في ' . $states->random();
        return [
            'name'=>$name,
            'description'=>'قائمة بـ'.$name ."...",
        ];
    }
}
