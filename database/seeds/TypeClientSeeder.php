<?php

use Illuminate\Database\Seeder;

class TypeClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            DB::table('type_clients')->insert([
                'name' => Str::random(10),
            ]);
        }
    }
}
