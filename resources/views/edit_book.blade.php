<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5 d-flex justify-content-center">

    <div class="w-50">
        <h2 class="text-center mb-4">Edit Book your book</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control form-control w-100" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control form-control w-100" id="author" name="author" value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-3">
                <label for="genres" class="form-label">Genres</label>
                <input type="text" class="form-control form-control w-100" id="genres" name="genres" value="{{ old('genres', $book->genres) }}" required>
            </div>

            <div class="mb-3">
                <label for="pages" class="form-label">Pages</label>
                <input type="number" class="form-control form-control w-100" id="pages" name="pages" value="{{ old('pages', $book->pages) }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Book</button>
                <a href="{{ route('browse_books') }}" class="btn btn-secondary">Back to Book List</a>
            </div>
        </form>
    </div>

</body>
</html>
