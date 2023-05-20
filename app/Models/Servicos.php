<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'servicos';
    protected $fillable = [
        'id',
        'nome',
    ];
}
