<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorios extends Model
{
    use HasFactory;
    protected $table = 'relatorio';
    protected $fillable = [
        'id',
        'descricao',
        'data',
    ];
}
