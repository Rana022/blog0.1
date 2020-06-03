<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('basics')->insert([
            'blog_name' => 'Blog022',
            'welcome_speech' => 'Hello!welcome to',
            'slogan' => 'welcome to  our blog',
            'address' => 'Dhamrai,Dhaka-1820',
            'contact' => '01863645135',
            'email' => 'ghosh1706022@gmail.com',
        ]);
    }
}
