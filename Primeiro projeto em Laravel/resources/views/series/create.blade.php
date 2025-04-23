<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div>
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome da série" required>
            {{-- Cria um campo de entrada de texto para o nome da série --}}
            <button type="submit" class="btn btn-warning mt-2 ">Adicionar</button>
            <a href="{{ route('series.index') }}" class="btn btn-dark mt-2">Voltar para página inical</a>
        </div>

    </form>
</x-layout>