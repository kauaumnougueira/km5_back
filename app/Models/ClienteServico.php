<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteServico extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'cliente_servico';
    protected $fillable = [
        'id',
        'id_cliente',
        'id_servico',
        'data'
    ];
}
