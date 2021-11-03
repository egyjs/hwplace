<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'القاهره',
                'description' => 'القاهرة هي عاصمة جمهورية مصر العربية وأكبر وأهم مدنها على الإطلاق، وتعد أكبر مدينة عربية من حيث تعداد السكان والمساحة، وتحتل المركز الثاني أفريقياً والسابع عشر عالمياً من حيث التعداد السكاني، يبلغ عدد سكانها 21,322,750 مليون نسمة حسب إحصائيات عام 2021. يمثلون 20% من إجمالي تعداد سكان مصر. ',
                'C' => NULL,
                'country_id' => 1,
                'lat' => '30.0445',
                'lng' => '31.2388',
                'active' => 1,
                'created_at' => '2021-09-13 16:53:13',
                'updated_at' => '2021-09-13 16:53:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'الجيزة',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:08:03',
                'updated_at' => '2021-09-14 22:18:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'الاسكندرية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:19:20',
                'updated_at' => '2021-09-14 22:19:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'الساحل الشمالي',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:19:31',
                'updated_at' => '2021-09-14 22:19:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'القليوبية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:19:41',
                'updated_at' => '2021-09-14 22:19:47',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'الغربية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:20:00',
                'updated_at' => '2021-09-14 22:20:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'المنوفية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:20:09',
                'updated_at' => '2021-09-14 22:20:09',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'الفيوم',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:20:18',
                'updated_at' => '2021-09-14 22:20:18',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'الدقهلية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:20:46',
                'updated_at' => '2021-09-14 22:20:46',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'الشرقية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:20:59',
                'updated_at' => '2021-09-14 22:20:59',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'البحيرة',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:21:14',
                'updated_at' => '2021-09-14 22:21:14',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'دمياط',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:22:59',
                'updated_at' => '2021-09-14 22:22:59',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'مرسي مطروح',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:23:11',
                'updated_at' => '2021-09-14 22:23:11',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'أسيوط',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:23:52',
                'updated_at' => '2021-09-14 22:23:52',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'الإسماعيلية',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:24:12',
                'updated_at' => '2021-09-14 22:24:12',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'الغردقة',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:24:22',
                'updated_at' => '2021-09-14 22:24:22',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'شرم الشيخ',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:24:49',
                'updated_at' => '2021-09-14 22:24:49',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'بورسعيد',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:25:00',
                'updated_at' => '2021-09-14 22:25:00',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'السويس',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:31:22',
                'updated_at' => '2021-09-14 22:31:22',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'سوهاج',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:31:29',
                'updated_at' => '2021-09-14 22:31:29',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'المنيا',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:31:37',
                'updated_at' => '2021-09-14 22:31:37',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'كفر الشيخ',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:32:02',
                'updated_at' => '2021-09-14 22:32:02',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'الأقصر',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:32:56',
                'updated_at' => '2021-09-14 22:32:56',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'قنا',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:33:10',
                'updated_at' => '2021-09-14 22:33:10',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'أسوان',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:33:25',
                'updated_at' => '2021-09-14 22:33:25',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'بني سويف',
                'description' => NULL,
                'C' => NULL,
                'country_id' => 1,
                'lat' => NULL,
                'lng' => NULL,
                'active' => 1,
                'created_at' => '2021-09-14 22:33:34',
                'updated_at' => '2021-09-14 22:33:34',
            ),
        ));
        
        
    }
}