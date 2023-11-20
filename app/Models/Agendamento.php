<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [

        'data',
        'hora',
        'observacao',
        'status',
        'id_cliente',
        'id_user',
        'valor_total'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'agendamento_servico', 'id_agendamento', 'id_servico');
    }

    
}
