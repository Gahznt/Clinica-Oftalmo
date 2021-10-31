<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'dat_nascimento', 'sexo', 'cpf', 'endereco', 'telefone', 'convenio'
    ];
}
