<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    @if(session('error'))
        <p style="color: rgb(177, 23, 23);">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nome:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label>
        <input type="password" name="password" required><br><br>

        <label>Confirmar Senha:</label>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html> 