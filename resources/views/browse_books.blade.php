<!DOCTYPE html>
<html>
<head>
    <title>Browse Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Books</h2>


    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    
    @forelse ($books as $book)
        <p>
            <strong>Title:</strong> {{ $book->title }}<br>

            <!-- Formulário de deletação -->
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">🗑️ Deletar</button>
            </form>
        </p>
    @empty
        <p>No results</p>
    @endforelse

    <a href="{{ route('create_book') }}" class="btn btn-primary btn-lg mt-3">
        📖 Cadastrar Novo Livro
    </a>


</body>
</html>
