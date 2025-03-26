<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // atributo protegido, array de campos de uma tabela liberados para salvamento em massa
    // Define os campos permitidos para preenchimento em massa.
    protected $fillable = [
        'title', 'body'
    ];

    // config gerais do model
    // relações
    // 1->1
    // 1->N
    // N->N
}