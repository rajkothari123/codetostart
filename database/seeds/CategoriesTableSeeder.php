<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=new Category();
    	$category->name='Laravel';
    	$category->slug='laravel';
    	$category->save();


    	$category=new Category();
    	$category->name='PHP';
    	$category->slug='php';
    	$category->save();

    	$category=new Category();
    	$category->name='AngularJS';
    	$category->slug='angularjs';
    	$category->save();

    }
}
