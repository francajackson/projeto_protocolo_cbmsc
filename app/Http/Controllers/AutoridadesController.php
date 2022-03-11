<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoridadesController extends Controller
{
    public function autoridades() {
        return view('app.autoridades', ['titulo' => 'Autoridades']);
    }
}
