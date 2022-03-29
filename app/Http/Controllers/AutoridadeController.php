<?php

namespace App\Http\Controllers;

use App\Autoridade;
use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutoridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $autoridades = Autoridade::paginate(5);
        $cargos = Cargo::all();

        return view('app.autoridade.index', ['autoridades' => $autoridades, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autoridades = Autoridade::all();
        $cargos = Cargo::all();
        return view('app.autoridade.create', ['cargos' => $cargos, 'autoridades' => $autoridades]);
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
            'precedencia' => 'required|unique:autoridades|max:40',
            'cargo_aut'=>'unique:autoridades|exists:cargos,cargo',
            'nome'=>'unique:autoridades'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'max' => 'O campo deve ser no máximo 50 caracteres',
            'cargo_aut.unique' => 'O cargo informado já esta cadastrado',
            'precedencia.unique' => 'A precedência informada já esta em uso',
            'nome.unique' => 'A autoridade já esta cadastrada',
            'cargo_aut.exists' => 'O cargo informado não existe'
        ];

        $request->validate($regras, $feedback);
                
        $data = $request->all();

        if ($request->hasFile('foto') && $request->foto->isValid()){
            $imagePath = $request->foto->store('autoridades');

            $data['foto'] = $imagePath;
        }
        
        Autoridade::create($data);
        return redirect()->route('autoridade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function show(Autoridade $autoridade)
    {
        return view('app.autoridade.show',['autoridade' => $autoridade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoridade $autoridade)
    {
        $cargos = Cargo::all();
        return view('app.autoridade.edit',['autoridade' => $autoridade, 'cargos' => $cargos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoridade $autoridade)
    {      
        $data = $request->all();

        if ($request->hasFile('foto') && $request->foto->isValid()){
            
            if ($autoridade->foto && Storage::exists($autoridade->foto)) {
                Storage::delete($autoridade->foto);
            }
            
            $imagePath = $request->foto->store('autoridades');
            $data['foto'] = $imagePath;
        }

        $autoridade->update($data);

        return redirect()->route('autoridade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autoridade  $autoridade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoridade $autoridade)
    {
        $autoridade->delete();
        return redirect()->route('autoridade.index');
    }
}