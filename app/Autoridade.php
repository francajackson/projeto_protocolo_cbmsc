<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoridade extends Model
{
    protected $fillable = ['protocolo',
                        'precedencia',
                        'cargo_aut',
                        'nome',
                        'foto',
                        'representando',
                        'precedencia_principal',
                        'cargo_principal',
                        'nome_principal'];
}