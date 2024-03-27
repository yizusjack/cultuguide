<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Administrador';
        $admin->email = 'admin@prueba.test'; 
        $admin->email_verified_at = now();
        $admin->password = Hash::make('12345');
        $admin->save();
        $admin->roles()->sync(1);

        $admin = new User();
        $admin->name = 'Usuario1';
        $admin->email = 'usuario1@prueba.test'; 
        $admin->email_verified_at = now();
        $admin->password = Hash::make('12345');
        $admin->save();
        $admin->roles()->sync(2);
    }
}
