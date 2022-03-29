<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoridade extends Model
{
    protected $fillable = ['protocolo','precedencia','cargo_aut', 'nome', 'foto'];
}