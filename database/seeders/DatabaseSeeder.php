<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OfficeTypeTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UserTableSeed::class);
        $this->call(PostTableSeed::class);
    }
}
