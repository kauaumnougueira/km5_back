<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'tipo_servico';
    protected $fillable = [
        'id',
        'id_servico',
        'nome' 
    ];
}
