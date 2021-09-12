<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
            'name' => 'SUPER_ADMIN',
            'email' => 'hawidahany112@gmail.com',
            'type'=>'SUPER_ADMIN',
            'password' => bcrypt('pass1029'),

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
