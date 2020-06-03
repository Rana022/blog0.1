<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Mr.Admin',
            'username' => 'Admin',
            'email' => 'rana1706022@gmail.com',
            'password' => Hash::make('rana1706022'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Mr.Author',
            'username' => 'Author',
            'email' => 'ghosh1706022@gmail.com',
            'password' => Hash::make('ghosh1706022'),
        ]);
    }
}
