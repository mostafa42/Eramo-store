<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $data = [
            [
                "title_ar"=>"ادوات كهربائية",
                "title_en"=>"Electrical Tools",
                "summary_ar"=>"ادوات كهربائية ادوات كهربائية",
                "summary_en"=>"Electrical Tools",
                "description_ar"=>"ادوات كهربائية",
                "description_en"=>"Electrical Tools",
                "keywords_ar"=>"ادوات كهربائية",
                "keywords_en"=>"Electrical Tools",
                "parent_id"=>null,
            ],
            [
                "title_ar"=>"سوبر ماركت",
                "title_en"=>"Super Market",
                "summary_ar"=>"سوبر ماركت",
                "summary_en"=>"Super Market",
                "description_ar"=>"سوبر ماركت",
                "description_en"=>"Super Market",
                "keywords_ar"=>"سوبر ماركت",
                "keywords_en"=>"Super Market",
                "parent_id"=>null,
            ],
            [
                "title_ar"=>"اكسسوارات",
                "title_en"=>"accessories",
                "summary_ar"=>"اكسسوارات",
                "summary_en"=>"accessories",
                "description_ar"=>"اكسسوارات",
                "description_en"=>"accessories",
                "keywords_ar"=>"اكسسوارات",
                "keywords_en"=>"accessories",
                "parent_id"=>null,
            ],

            [
                "title_ar"=>"العناية الشخصية ",
                "title_en"=>"Personal care",
                "summary_ar"=>"العناية الشخصية ",
                "summary_en"=>"Personal care",
                "description_ar"=>"العناية الشخصية ",
                "description_en"=>"Personal care",
                "keywords_ar"=>"العناية الشخصية ",
                "keywords_en"=>"Personal care",
                "parent_id"=>null,
            ],

            [
                "title_ar"=>"الصحة والجمال",
                "title_en"=>"health and beauty",
                "summary_ar"=>"الصحة والجمال",
                "summary_en"=>"health and beauty",
                "description_ar"=>"الصحة والجمال",
                "description_en"=>"health and beauty",
                "keywords_ar"=>"الصحة والجمال",
                "keywords_en"=>"health and beauty",
                "parent_id"=>null,
            ],

            [
                "title_ar"=>"الفن والعلوم الإنسانية",
                "title_en"=>"Art & Humanities",
                "summary_ar"=>"الفن والعلوم الإنسانية",
                "summary_en"=>"Art & Humanities",
                "description_ar"=>"الفن والعلوم الإنسانية",
                "description_en"=>"Art & Humanities",
                "keywords_ar"=>"الفن والعلوم الإنسانية",
                "keywords_en"=>"Art & Humanities",
                "parent_id"=>null,
            ],







            [
                "title_ar"=>"موبايل وتابلت",
                "title_en"=>"Mobile and tablet",
                "summary_ar"=>"موبايل وتابلت",
                "summary_en"=>"Mobile and tablet",
                "description_ar"=>"موبايل وتابلت",
                "description_en"=>"Mobile and tablet",
                "keywords_ar"=>"موبايل و تابلت",
                "keywords_en"=>"Mobile and tablet",
                "parent_id"=>null,
            ],



            [
                "title_ar"=>"الهواتف الذكية",
                "title_en"=>"smart phones",
                "summary_ar"=>"الهواتف الذكية",
                "summary_en"=>"smart phones",
                "description_ar"=>"الهواتف الذكية",
                "description_en"=>"smart phones",
                "keywords_ar"=>"الهواتف الذكية",
                "keywords_en"=>"smart phones",
                "parent_id"=>7,
            ],



            [
                "title_ar"=>"اكسسوارات هواتف",
                "title_en"=>"Phone accessories",
                "summary_ar"=>"اكسسوارات هواتف",
                "summary_en"=>"Phone accessories",
                "description_ar"=>"اكسسوارات هواتف",
                "description_en"=>"Phone accessories",
                "keywords_ar"=>"اكسسوارات هواتف",
                "keywords_en"=>"Phone accessories",
                "parent_id"=>7,
            ],

            [
                "title_ar"=>"تابلت",
                "title_en"=>"tablet",
                "summary_ar"=>"تابلت",
                "summary_en"=>"tablet",
                "description_ar"=>"تابلت",
                "description_en"=>"tablet",
                "keywords_ar"=>"تابلت",
                "keywords_en"=>"tablet",
                "parent_id"=>7,
            ],


            [
                "title_ar"=>"العنايه بالبشره",
                "title_en"=>"Skin care",
                "summary_ar"=>"العنايه بالبشره",
                "summary_en"=>"Skin care",
                "description_ar"=>"العنايه بالبشره",
                "description_en"=>"Skin care",
                "keywords_ar"=>"العنايه بالبشره",
                "keywords_en"=>"Skin care",
                "parent_id"=>5,
            ],
            [
                "title_ar"=>"حلاقه وإزالة الشعر",
                "title_en"=>"Shaving and hair removal",
                "summary_ar"=>"حلاقه وإزالة الشعر",
                "summary_en"=>"Shaving and hair removal",
                "description_ar"=>"حلاقه وإزالة الشعر",
                "description_en"=>"Shaving and hair removal",
                "keywords_ar"=>"حلاقه وإزالة الشعر",
                "keywords_en"=>"Shaving and hair removal",
                "parent_id"=>5,
            ],
            [
                "title_ar"=>"العناية الأنثوية",
                "title_en"=>"feminine care",
                "summary_ar"=>"العناية الأنثوية",
                "summary_en"=>"feminine care",
                "description_ar"=>"العناية الأنثوية",
                "description_en"=>"feminine care",
                "keywords_ar"=>"العناية الأنثوية",
                "keywords_en"=>"feminine care",
                "parent_id"=>5,
            ],




        ];



        foreach($data as $category){
            ProductCategory::create($category);
        }
    }
}
