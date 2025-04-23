<x-layout title="Séries">
    {{-- Botão para adicionar nova série --}}
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    {{-- Mensagem de sucesso (flash) --}}
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Lista de séries --}}
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}

                <div class="btn-group">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-sm btn-primary me-1">Editar</a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja remover esta série?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    <script>
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 3500);
    </script>
</x-layout>