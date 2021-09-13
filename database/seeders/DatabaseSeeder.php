<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Section;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'مصر',
            'description' => 'مِصرُ أو هي دولة عربية تقع في الركن الشمالي الشرقي من قارة أفريقيا، ولديها امتداد آسيوي، حيث تقع شبه جزيرة سيناء داخل قارة آسيا فهي دولة عابرة للقارات، قُدّر عدد سكانها بـ104 ملايين نسمة، ليكون ترتيبها الثالثة عشر بين دول العالم بعدد السكان والأكثر سكانًا عربيًّا.',
            'un_code'=>'20',
            'iso'=>'EG',
            'currency'=>'EGP',
            'currency_code'=>'£',
        ]);

        State::create([
            'name' => 'القاهره',
            'description' => 'القاهرة هي عاصمة جمهورية مصر العربية وأكبر وأهم مدنها على الإطلاق، وتعد أكبر مدينة عربية من حيث تعداد السكان والمساحة، وتحتل المركز الثاني أفريقياً والسابع عشر عالمياً من حيث التعداد السكاني، يبلغ عدد سكانها 21,322,750 مليون نسمة حسب إحصائيات عام 2021. يمثلون 20% من إجمالي تعداد سكان مصر. ',
            'lat'=>'30.0445',
            'lng'=>'31.2388',
        ]);

        City::create([
            'name' => 'المعادي',
            'description' => 'يشتهر حي المعادي الراقي بشوارعه الهادئة والمشجّرة والمطاعم العصرية. وتنتشر المطاعم الأوروبية والمصرية على طول شارع 9، إلى جانب المقاهي المتخصصة بالمأكولات العضوية والنباتية. وتقدم أماكن الشرب الهادئة التي تشكل الوجهة المفضّلة لدى الحشود الأجنبية مشروبات كوكتيل وتعرض موسيقى حية وألعاب البارات. ويمتد ممشى الكورنيش على طول نهر النيل، الذي يمكن التجول فيه بواسطة الفلوكة، وهي قارب شراعي تقليدي خشبي.',
            'state_id'=> 1 ,
            'lat'=>'29.9667',
            'lng'=>'31.2500',
        ]);

        //---
        User::create([
            'name' => 'SUPER_ADMIN',
            'email' => 'hawidahany112@gmail.com',
            'type'=>'SUPER_ADMIN',
            'password' => bcrypt('pass1029'),

        ]);

        //---
        Section::insert([
            ['name' => 'مطاعم','icon'=>'-','keywords'=>'-','created_at'=>Carbon::now()],
            ['name' => 'صيدليات','icon'=>'-','keywords'=>'-','created_at'=>Carbon::now()],
            ['name' => 'هايبرماركت','icon'=>'-','keywords'=>'-','created_at'=>Carbon::now()],
        ]);



        // \App\Models\User::factory(10)->create();
    }
}
