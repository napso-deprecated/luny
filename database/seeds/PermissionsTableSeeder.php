<?php

use App\User;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            [
                'name' => 'edit page'
            ],
            [
                'name' => 'edit comments'
            ],
            [
                'name' => 'edit users'
            ]

        ];

        DB::table('permissions')->insert($permissions);

        $permissionsUsers = [
            [
                'user_id' => '1',
                'permission_id' => '1',
            ],
            [
                'user_id' => '1',
                'permission_id' => '2',
            ],
            [
                'user_id' => '1',
                'permission_id' => '3',
            ],
        ];

        DB::table('permissions_users')->insert($permissionsUsers);

    }
}
