<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $dates = [
        'data'
    ];
    
    protected $fillable = ['data', 'descricao', 'valor'];
}
