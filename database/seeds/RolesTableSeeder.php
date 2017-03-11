<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$role_admin=new Role();
    	$role_admin->name='Administrator';
    	$role_admin->save();

        $role_author=new Role();
        $role_author->name='Author';
        $role_author->save();


    	$role_subscriber=new Role();
    	$role_subscriber->name='Subscriber';
    	$role_subscriber->save();





    }
}
