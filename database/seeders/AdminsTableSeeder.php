<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@dym-job.jp',
                'password' => bcrypt((string)'secret'),
            ]
        );
    }
}
