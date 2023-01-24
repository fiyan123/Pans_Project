<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // membuat Role
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', // optional
        ]);

        $memberRole = Role::create([
            'name' => 'member',
            'display_name' => 'Project Member', // optional

        ]);
        
        // membuat sample user
        $adminUser = new User();
        $adminUser->name = 'Admin Sekolah';
        $adminUser->email = 'admin@gmail.com'; // optional
        $adminUser->password = bcrypt('password');
        $adminUser->save();
        $adminUser->attachRole($adminRole);

        $memberUser = new User();
        $memberUser->name = 'Guru Sekolah';
        $memberUser->email = 'guru@gmail.com'; // optional
        $memberUser->password = bcrypt('password');
        $memberUser->save();
        $memberUser->attachRole($memberRole);

    }
}
