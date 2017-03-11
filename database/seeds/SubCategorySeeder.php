<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    DB::table('subcategory')->insert([
    [
        'name' => 'subcat1',
        'slug' => 'sub-cat1',
        'category_id'=>1
    ],
    [
      'name' => 'subcat2',
        'slug' => 'sub-cat2',
        'category_id'=>1
    ]
]);
    }
}

