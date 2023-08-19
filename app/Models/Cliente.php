<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'sexo', 'estado', 'cidade'];

    protected $attributes = [
        'nome' => 'Nome do Cliente',
        'cpf' => 'CPF',
        'data_nascimento' => 'Data de Nascimento',
        'sexo' => 'Sexo',
        'estado' => 'Estado',
        'cidade' => 'Cidade',
    ];
}
