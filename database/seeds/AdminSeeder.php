<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        	DB::table('quantri')->insert(
	        	[
                    'id' => '1',  
                    'name' => 'Admin',   
	        		'username' => 'admin',
                    'email' => 'tranchitrung199612@gmail.com',
	            	'password' => bcrypt('admin'),
	        	]
        	);
    }
}