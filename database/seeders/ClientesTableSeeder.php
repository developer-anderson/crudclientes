<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesTableSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nome' => 'Cliente 1',
            'cpf' => '123.456.789-01',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'Masculino',
            'estado' => 'SP',
            'cidade' => 'São Paulo',
        ]);

        Cliente::create([
            'nome' => 'Cliente 2',
            'cpf' => '987.654.321-01',
            'data_nascimento' => '1985-05-15',
            'sexo' => 'Feminino',
            'estado' => 'RJ',
            'cidade' => 'Rio de Janeiro',
        ]);
    }
}
