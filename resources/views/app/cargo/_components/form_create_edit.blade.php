@if (isset($cargo->id))
    <form method="post" action= "{{ route('cargo.update', ['cargo' => $cargo]) }}">
        @csrf
        @method('PUT')  
@else
    <form method="post" action= "{{ route('cargo.store') }}">
        @csrf
@endif
    <input type="text" name="precedencia" value="{{ $cargo->precedencia ?? old('precedencia') }}" placeholder="Precedência" class="borda-preta">
    <br>
    @if($errors->has('precedencia'))
        {{ $errors->first('precedencia') }}
    @endif
    <input type="text" name="cargo" value="{{ $cargo->cargo ?? old('cargo') }}" placeholder="Cargo/Função" class="borda-preta">
    <br>
    @if($errors->has('cargo'))
        {{ $errors->first('cargo') }}
    @endif
    <button type="submit" class="borda-preta">
        @if (isset($cargo->id))
            ATUALIZAR         
        @else
            CADASTRAR
        @endif
    </button>
    </form>