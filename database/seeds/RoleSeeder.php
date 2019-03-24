<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['guard_name' => 'web', 'name' => 'admin']);
        Role::create(['guard_name' => 'web', 'name' => 'manager']);
        Role::create(['guard_name' => 'web', 'name' => 'salesPerson']);


        $i = 1;
        foreach (User::all() as $user) {
            if ($i > 3) {
                $i = 1;
            }
            $user->assignRole($i);
            $i++;
        }
    }
}
