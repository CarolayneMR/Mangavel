<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="row">
        @forelse ($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">
                        <strong>Author:</strong> {{ $book->author }} <br> 
                        <strong>Genres:</strong> {{ $book->genres }} <br>
                        <strong>Pages:</strong> {{ $book->pages }}
                    </p>

                    <div class="d-flex justify-content-start mt-3">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm me-2">✏️ Edit</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No results</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('create_book') }}" class="btn btn-primary btn-lg">
            📖 Cadastrar Novo Livro
        </a>
    </div>

</body>
</html>
