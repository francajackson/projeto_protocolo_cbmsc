@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Cadastre aqui o Cargo</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <form action= {{ route('app.cargos') }} method="post">
                    @csrf
                    <input name="precedencia" type="text" placeholder="Precedência" class="borda-preta">
                    <br>
                    <input name="cargo" type="text" placeholder="Cargo/Função" class="borda-preta">
                    <br>
                    <button type="submit" class="borda-preta">CADASTRAR</button>
                </form>
            </div>
        </div>  
    </div>
@endsection