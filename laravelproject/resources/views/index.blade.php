<!DOCTYPE html>
<html>
<head>
    <title>Tableau de Bord</title>
</head>
<body>
    <h1>Bienvenue, {{ session('user_name') }}</h1>
    <p>Catégorie : {{ session('permission') }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
    <!-- <a href="{{ route('logout') }}">Déconnexion</a> -->
</body>
</html>
