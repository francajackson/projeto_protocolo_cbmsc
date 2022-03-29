<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['precedencia', 'cargo'];

    public function autoridade() {
        //Autoridade tem um cargo
        // 1 registro relacionando em Autoridade (fk) -> cargo_id e cargo_principal_id
        // cargos (pk) -> id
        return $this->hasOne('App\Autoridade');

    }
}
