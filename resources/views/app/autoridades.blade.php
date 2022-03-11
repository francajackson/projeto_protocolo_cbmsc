@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Cadastre aqui a autoridade</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <form action= {{ route('app.autoridades') }} method="post">
                    <input name="precendencia" type="text" placeholder="Precedência" class="borda-preta">
                    <br>
                    <select name="cargo" class="borda-preta">
                        <option value="">Cargo/Função</option>
                        <option value="">Puxar de outra tabela</option>
                        <option value="">Puxar de outra tabela</option>
                        <option value="">Puxar de outra tabela</option>
                    </select>
                    <br>
                    <input name="local_de_trabalho" type="text" placeholder="Local de Trabalho" class="borda-preta">
                    <br>
                    <input name="nome" type="text" placeholder="Nome" class="borda-preta">
                    <br>
                    <input name="foto" type="text" placeholder="Foto" class="borda-preta">
                    <br>
                    <input name="representando" type="text" placeholder="Representando?" class="borda-preta">
                    <br>
                    <select name="cargo_principal" class="borda-preta">
                        <option value="">Cargo/Função Principal</option>
                        <option value="">Puxar de outra tabela</option>
                        <option value="">Puxar de outra tabela</option>
                        <option value="">Puxar de outra tabela</option>
                    </select>
                    <br>
                    <input name="nome_principal" type="text" placeholder="Nome Principal" class="borda-preta">
                    <br>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>  
    </div>
@endsection