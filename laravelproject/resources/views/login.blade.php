<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Login</title>
</head>
<body>
    <form class="sign-in" action="{{ url('login') }}" method="post">
        @csrf
        <h2>Identifiant</h2>
        <input class="inputs" type="text" name="ID" required>
        <h2>Mot de Passe</h2>
        <input class="inputs" type="password" name="pass" required>
        <input class="valider" type="submit" value="Valider" name="Valider">
    </form>

    @if ($errors->any())
        <p>{{ $errors->first('login_error') }}</p>
    @endif
</body>
</html>
