@if (isset($autoridade->id))
    <form method="post" enctype="multipart/form-data" action= "{{ route('autoridade.update', ['autoridade' => $autoridade->id]) }}">
        @csrf
        @method('PUT') 
@else
    <form method="post" enctype="multipart/form-data" action= "{{ route('autoridade.store') }}">
        @csrf
@endif
    
<label for="">Protocolo Confirmado?</label>
<input type="checkbox" name="protocolo" value="Sim" class="borda-preta">
<br>
@if($errors->has('protocolo'))
    {{ $errors->first('protocolo') }}
@endif

<input type="text" name="precedencia" value="{{ $autoridade->precedencia ?? old('precedencia') }}" placeholder="Precedência" class="borda-preta">
<br>
@if($errors->has('precedencia'))
    {{ $errors->first('precedencia') }}
@endif

<select name="cargo_aut" class="borda-preta">
    <option >-- Selecione um Cargo/Função --</option>

    @foreach ($cargos as $cargo)
    <option value="{{ $cargo->cargo }}" {{ ($autoridade->cargo_aut ?? old('cargo_aut')) == $cargo->cargo ? 'selected' : '' }}>{{ $cargo->cargo }}</option>
    @endforeach

</select>
{{ $errors->has('cargo_aut') ? $errors->first('cargo_aut') : '' }}
<br>

<input type="text" name="nome" value="{{ $autoridade->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
<br>
@if($errors->has('nome'))
    {{ $errors->first('nome') }}
@endif

<input type="file" name="foto" value="{{ $autoridade->foto ?? old('foto') }}" placeholder="Foto" class="borda-preta">
<br>
@if($errors->has('foto'))
    {{ $errors->first('foto') }}
@endif

<label for="comRepresentacao">Representando?</label>
<input onclick="hideShow()" type="radio" name="representando" value="Sim" class="borda-preta" id="representandoS">
<label for="representandoS">Sim</label>
<br>
<input onclick="hideShow()" type="radio" name="representando" value="" class="borda-preta" id="representandoN">
<label for="representandoN">Não</label>

<div id="comRepresentacao">

    <input type="text" name="precedencia_principal" id="precedencia_principal" value="{{ $autoridade->precedencia_principal ?? old('precedencia_principal') }}" placeholder="Precedência" class="borda-preta">
    <br>
    @if($errors->has('precedencia_principal'))
        {{ $errors->first('precedencia_principal') }}
    @endif

    <select name="cargo_principal" class="borda-preta" id="cargo_principal">
        <option value=''>-- Selecione um Cargo/Função --</option>

        @foreach ($autoridades as $autoridade)
        <option value="{{ $autoridade->cargo_aut }}" {{ ($autoridade->cargo_principal ?? old('cargo_principal')) == $autoridade->cargo_aut ? 'selected' : '' }}>{{ $autoridade->cargo_aut }}</option>                
        @endforeach

    </select>
    {{ $errors->has('cargo_principal') ? $errors->first('cargo_principal') : '' }}
    <br>
    
    <input type="text" id="nome_principal" name="nome_principal" value="{{ $autoridade->nome_principal ?? old('nome_principal') }}" placeholder="Nome da Autoridade Representada" class="borda-preta">
    <br>
    @if($errors->has('nome_principal'))
        {{ $errors->first('nome_principal') }}
    @endif
</div>

<button type="submit" class="borda-preta">
    @if (isset($autoridade->id))
        ATUALIZAR         
    @else
        CADASTRAR
    @endif
</button>
</form>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#comRepresentacao").prop("hidden", true);
        $("#precedencia_principal").prop("disabled", true);
        $("#nome_principal").prop("disabled", true);
        $("#representandoS").click(function() {
            if (this.value=="Sim") {
                this.value = "Sim";
                $("#comRepresentacao").prop("hidden", false);
                $("#precedencia_principal").prop("disabled", false);
                $("#nome_principal").prop("disabled", false);

            }
            else {
                this.value = "";
                $("#comRepresentacao").prop("hidden", true);
                $("#precedencia_principal").value("");
                $("#nome_principal").value("");
            }
        });
        $("#representandoN").click(function() {
            if (this.value=="") {
                this.value = "";
                $("#comRepresentacao").prop("hidden", true);
                $("#precedencia_principal").value("");
                $("#nome_principal").value("");
            }
            else {
                this.value = "Sim";
                $("#comRepresentacao").prop("hidden", false);
                $("#precedencia_principal").prop("disabled", false);
                $("#nome_principal").prop("disabled", false);
            }
        });
    });
</script>