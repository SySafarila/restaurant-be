<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSyncPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::findByName('admin');
        $cashier = Role::findByName('cashier');
        $customer = Role::findByName('customer');

        $admin->syncPermissions(['admin access', 'cashier access', 'customer access']);
        $cashier->syncPermissions(['cashier access']);
        $customer->syncPermissions(['customer access']);
    }
}
