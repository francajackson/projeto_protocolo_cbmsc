<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function cargos() {
        return view('app.cargos');
    }
}
