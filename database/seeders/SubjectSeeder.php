<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'Matemáticas',
            'code' => 'MAT',
            'knowledge' => 'Conjuntos numéricos',
        ]);

        Subject::create([
            'name' => 'Física',
            'code' => 'FIS',
            'knowledge' => 'Leyes de Newton',
        ]);

        Subject::create([
            'name' => 'Química',
            'code' => 'QUI',
            'knowledge' => 'Tabla periódica',
        ]);

        Subject::create([
            'name' => 'Biología',
            'code' => 'BIO',
            'knowledge' => 'Células',
        ]);

        Subject::create([
            'name' => 'Historia',
            'code' => 'HIS',
            'knowledge' => 'Revolución francesa',
        ]);

        Subject::create([
            'name' => 'Geografía',
            'code' => 'GEO',
            'knowledge' => 'Climas',
        ]);
    }
}
