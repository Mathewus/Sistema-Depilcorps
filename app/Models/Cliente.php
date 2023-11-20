<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


    protected $fillable = [

        'nome',
        'data_nasc',
        'sexo',
        'email',
        'telefone',
        'telefone_contato',
        'cidade',
        'estado',
        'logradouro',
        'bairro',
        'cep',
        'id_user'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function agendamento () {
        return $this->hasMany(Agendamento::class, 'id_cliente');
    }
}
