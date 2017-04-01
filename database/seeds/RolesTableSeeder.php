<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'user'
            ],
            [
                'name' => 'admin'
            ],
            [
                'name' => 'super admin'
            ]

        ];

        DB::table('roles')->insert($roles);


        $roleUsers = [
            [
                'user_id' => '1',
                'role_id' => '1',
            ],
            [
                'user_id' => '1',
                'role_id' => '2',
            ],
            [
                'user_id' => '1',
                'role_id' => '3',
            ],
            [
                'user_id' => '2',
                'role_id' => '2',
            ],
            [
                'user_id' => '3',
                'role_id' => '2',
            ],
        ];

        DB::table('roles_users')->insert($roleUsers);


        $permissionsRoles = [
            [
                'role_id' => '3',
                'permission_id' => '1',
            ],
            [
                'role_id' => '3',
                'permission_id' => '2',
            ],
            [
                'role_id' => '3',
                'permission_id' => '3',
            ],
        ];

        DB::table('permissions_roles')->insert($permissionsRoles);


    }
}
