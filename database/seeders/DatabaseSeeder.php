<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Credit; 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Definieer permissies
        $permissions = [
            'admin users',
            'admin presets',
            'manage sales',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Creëer rollen en wijs permissies toe
        Role::firstOrCreate(['name' => 'admin'])->givePermissionTo(['admin users', 'admin presets']);
        Role::firstOrCreate(['name' => 'verkoper'])->givePermissionTo('manage sales');
        Role::firstOrCreate(['name' => 'user']);

        // Bepaal wachtwoord op basis van omgeving
        $password = config('app.env') === 'production' ? 'sa8aFebqUArIHiO' : 'password';

        // Creëer 2 admin-accounts
        for ($i = 1; $i <= 2; $i++) {
            $admin = User::firstOrCreate(
                ['email' => "admin{$i}@example.com"],
                [
                    'name' => "Admin {$i}",
                    'password' => Hash::make($password),
                ]
            );
            $admin->assignRole('admin');

            // Voeg 10 credits toe aan de gebruiker
            Credit::firstOrCreate(['user_id' => $admin->id], ['amount' => 10]);
        }

        // Creëer 5 verkopersaccounts
        for ($i = 1; $i <= 5; $i++) {
            $verkoper = User::firstOrCreate(
                ['email' => "verkoper{$i}@example.com"],
                [
                    'name' => "Verkoper {$i}",
                    'password' => Hash::make($password),
                ]
            );
            $verkoper->assignRole('verkoper');

            // Voeg 10 credits toe aan de gebruiker
            Credit::firstOrCreate(['user_id' => $verkoper->id], ['amount' => 10]);
        }

        // Creëer 10 gebruikersaccounts
        for ($i = 1; $i <= 10; $i++) {
            $user = User::firstOrCreate(
                ['email' => "user{$i}@example.com"],
                [
                    'name' => "User {$i}",
                    'password' => Hash::make($password),
                ]
            );
            $user->assignRole('user');

            // Voeg 10 credits toe aan de gebruiker
            Credit::firstOrCreate(['user_id' => $user->id], ['amount' => 10]);
        }
    }
}
