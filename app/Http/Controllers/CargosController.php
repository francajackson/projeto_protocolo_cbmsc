<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function cargos() {

       //var_dump($_POST);
        return view('app.cargos', ['titulo' => 'Cargos']);
    }
}