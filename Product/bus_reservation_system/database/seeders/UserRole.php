<?php

namespace Database\Seeders;

use App\Models\UserRole as ModelsUserRole;
use Illuminate\Database\Seeder;

class UserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsUserRole::create([
            'role_name' => 'Admin',
        ]);

        ModelsUserRole::create([
            'role_name' => 'Client',
        ]);
    }
}
