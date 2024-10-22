<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Categoria::create([
                'nombre' => 'Categoría n' . Str::random(3), 
                'descripcion' => 'Descripción ' . Str::random(5)
            ]);
        }
    }
}
