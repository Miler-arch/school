<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Roberth',
            'paternal_lastname' => 'Doe',
            'maternal_lastname' => 'Smith',
            'birthdate' => '1990-01-01',
            'gender' => 'Masculino',
            'address' => '123 Main St.',
            'phone' => '76454545',
            'role' => 'Administrador',
            'status' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Bq1@1234'),
        ])->assignRole('Administrador');
    }
}
