<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'endereco',
        'desde'
    ];
}
