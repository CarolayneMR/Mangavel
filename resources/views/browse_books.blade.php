<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="container mx-auto mt-5">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white mb-4 p-4">
        <div class="flex justify-between items-center">
            <span class="font-extrabold text-3xl tracking-wide">Mangavel</span>
            <span class="font-semibold text-lg italic">
                @if (Auth::check())
                    {{ Auth::user()->name }}
                @endif
            </span>
        </div>
    </nav>

    <h2 class="text-2xl font-semibold mb-4">Livros</h2>

    @if (session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($books as $book)
        <div class="bg-white p-4 rounded shadow-md">
            <h5 class="text-xl font-semibold">{{ $book->titulo }}</h5>
            <p>
                <strong>Autor:</strong> {{ $book->author }} <br>
                <strong>Gênero:</strong> {{ $book->genres }} <br>
                <strong>Páginas:</strong> {{ $book->pages }}
            </p>

            <div class="flex space-x-2 mt-4">
                <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">✏️ Editar</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">🗑️ Deletar</button>
                </form>
            </div>
        </div>
        @empty
        <p>Nenhum resultado</p>
        @endforelse
    </div>

    <div class="flex justify-center mt-8">
        <a href="{{ route('create_book') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-700">
            📖 Cadastrar Novo Livro
        </a>
    </div>

    <div class="flex justify-center mt-4"> 
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-700">
                Sair
            </button>
        </form>
    </div>
   
</body>
</html>
