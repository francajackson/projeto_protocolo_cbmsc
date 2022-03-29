<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cargos = Cargo::where('precedencia', 'like', '%'.$request->input('precedencia').'%')
            ->where('cargo', 'like', '%'.$request->input('cargo').'%')      
        ->paginate(3);

        return view('app.cargo.index', ['cargos' => $cargos, 'request' => $request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('app.cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $regras = [
            'precedencia'=>'required|unique:cargos',
            'cargo'=>'required|min:4|unique:cargos'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter no mínimo 4 caracteres',

            'cargo.unique' => 'O cargo informado já esta cadastrado',
            'precedencia.unique' => 'A precedência informada já esta em uso'
        ];
        
        $request->validate($regras, $feedback);

        Cargo::create($request->all());
        return redirect()->route('cargo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //dd($cargo);
        return view('app.cargo.show',['cargo' => $cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('app.cargo.edit', ['cargo' => $cargo]);
        //return view('app.cargo.create', ['cargo' => $cargo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        $cargo->update($request->all());
        return redirect()->route('cargo.show',['cargo' => $cargo->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo.index');
    }
    
}
