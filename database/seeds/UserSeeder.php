<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ]);
            DB::table('users')->insert([
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('manager'),
            ]);
            DB::table('users')->insert([
                'name' => 'sales1',
                'email' => 'sales1@gmail.com',
                'password' => bcrypt('sales1'),
            ]);
            DB::table('users')->insert([
                'name' => 'sales2',
                'email' => 'sales2@gmail.com',
                'password' => bcrypt('sales2'),
            ]);
    }
}
