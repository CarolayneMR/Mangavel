<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Adicione um Livro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="genres" class="form-label">Genres</label>
            <input type="text" id="genres" name="genres" class="form-control">
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Number of Pags</label>
            <input type="number" id="pages" name="pages" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Submit!</button>
    </form>
</body>
</html>
