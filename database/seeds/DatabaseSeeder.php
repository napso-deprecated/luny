<?php

use App\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Model::unguard();

         $this->call(UsersTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(PagesTableSeeder::class);
         $this->call(RolesTableSeeder::class);

        Model::reguard();
    }
}
