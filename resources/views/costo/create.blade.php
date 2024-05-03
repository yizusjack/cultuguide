<form method="POST" action="{{ route('costos.store') }}">
    @csrf
    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria['value'] }}">{{ $categoria['value'] }}</option>
        @endforeach
    </select>
    <br>
    <label for="costo">Costo:</label>
    <input type="text" name="costo" id="costo">
    <br>
    <button type="submit">Guardar</button>
</form>
