<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_one=new Blog();
    	$blog_one->title='This is pfizer Post';
    	$blog_one->slug='this-is-pfizer-post';
    	$blog_one->meta_desc='This is Pfizer Post';
        $blog_one->user_id=1;
        $blog_one->status=1;
    	$blog_one->meta_title='This is Pfizer Post';
    	$blog_one->body='At Pfizer, our colleagues encompass a variety of backgrounds, skills, strengths and knowledge.They’ve taken many paths to get here, and once here, take many paths to advance their careers. Pfizer colleagues exhibit the tenets of our OWNIT! culture by fostering an environment of productivity, trust, decisiveness and candor. And they care.
Every day and in dozens of ways big and small, Pfizer colleagues care about fulfilling our purpose of innovating to bring therapies to patients that significantly improve their lives. We invite you to meet some of these exceptional colleagues and learn how working at Pfizer has provided them with opportunity, meaning, and a path to achieve their career goals.';
    	$blog_one->save();


        $blog_two=new Blog();
    	$blog_two->title='This is Cipla Post';
    	$blog_two->slug='this-is-cipla-post';
    	$blog_two->meta_desc='This is Cipla Post';
        $blog_two->user_id=1;
        $blog_two->status=1;
    	$blog_two->meta_title='This is Pfizer Post';
    	$blog_two->body='While due care and caution has been taken to ensure that this Site is free from mistakes or omission, Pfizer Limited shall not be responsible in any manner whatsoever, for any action taken, opinions expressed, advice rendered or accepted, any direct incidental, special or consequential loss and damage caused on the basis of any material or information published on this Site. 
The content on this site is offered only as information and it does not constitute solicitation or provision of Medical advice.  The content here should not be used as a substitute for obtaining Medical advice from a licensed health care .';
    	$blog_two->save();
    }
}
