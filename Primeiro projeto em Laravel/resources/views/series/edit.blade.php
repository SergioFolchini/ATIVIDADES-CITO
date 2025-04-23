<x-layout title="Editar Série">
    <form action="{{ route('series.update', $serie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" value="{{ $serie->nome }}" required>

        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
        <a href="{{ route('series.index') }}" class="btn btn-danger mt-2">Cancelar</a>
    </form>
</x-layout>