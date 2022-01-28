<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'sysafarila.official@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'sysafarila.dev@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'sysafarila.official.2@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);
        $user->assignRole('super admin');
    }
}
