<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/affichage_css.css') }}">
    <title>Liste des Étudiants</title>
</head>
<body>
    <a id="a1" href="{{ route('logout') }}">Logout</a>
    <a id="a2" href="{{ url('nouveau') }}">New</a>
    <h1>Liste des Étudiants</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Maths</th>
                <th>Informatique</th>
                <th>Moyenne</th>
                <th>Mention</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->math }}</td>
                    <td>{{ $etudiant->info }}</td>
                    <td>{{ $moyenne = ($etudiant->math + $etudiant->info) / 2 }}</td>
                    <td>
                        @php
                            if ($moyenne >= 16) {
                                $mention = 'Très Bien';
                            } elseif ($moyenne >= 14) {
                                $mention = 'Bien';
                            } elseif ($moyenne >= 12) {
                                $mention = 'Assez Bien';
                            } elseif ($moyenne >= 10) {
                                $mention = 'Passable';
                            } else {
                                $mention = 'Non Admit';
                            }
                        @endphp
                        {{ $mention }}
                    </td>
                    <td>
                        <a id="a3" href="{{ route('etudiant.show' , $etudiant->id) }}">M</a>
                        @csrf
                        @method('PUT')
                        <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="a4">S</button>
                        </form>
                        <a id="a5" href="{{ route('etudiant.bulletin', $etudiant->id) }}">I</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
