<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin=new User();
    	$user_admin->role_id=1;
        $user_admin->username='rajkothari';
        $user_admin->website='rajkothari.com';
        $user_admin->facebook='http://www.facebook.com';
        $user_admin->twitter='http://www.twitter.com';
        $user_admin->github='http://github.com';
        $user_admin->about='My name is khan and i not a terrorist';
    	$user_admin->name='Raj Kothari';
    	$user_admin->email='raj.kothari@startuphand.com';
    	$user_admin->password=bcrypt('password');
    	$user_admin->save();

    	

    }
}

