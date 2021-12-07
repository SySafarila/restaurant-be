<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'admin access'
        ]);
        Permission::create([
            'name' => 'cashier access'
        ]);
        Permission::create([
            'name' => 'customer access'
        ]);
    }
}
