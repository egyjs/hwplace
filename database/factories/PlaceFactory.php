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
            'description' => $this->text(rand(1, 10)),

            'city_id'=> City::inRandomOrder()->first()->id,
            'section_id'=> Section::inRandomOrder()->first()->id,
            'images' => $this->randomImage(),
            'image' => $images[0],
            'website'=> $this->faker->url(),
            'view_rates' => rand(0,1),
            'rates' => rand(0,5),
            'is_top' => rand(0,1),
            'keywords' => implode(',',$this->faker->words(rand(2,10))),
        ];
    }

    public function text(int $paragraph_count = 1)
    {
        // text
        $text = "إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.";
        // duplicate text by paragraph_count variable
        for ($i = 1; $i <= $paragraph_count; $i++) {
            $text .= "<br>" . $text;
        }
        return $text;
    }
    public function randomImage(): array
    {
        $arr = [];
        $count = rand(2,20);
        for ($i = 0; $i < $count; $i++){
            $arr[] = 'https://placekitten.com/g/'.rand(300,400).'/'.rand(100,200);
        }

        return $arr;
    }
}
