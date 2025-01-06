<!-- resources/views/affichage.blade.php -->
<head>
    @vite('public/css/affichage_css.css')
</head>
@if (Auth::check())
    <!-- <h1>Welcome, {{ Auth::user()->nom }}</h1> -->

    <a href="{{ route('logout') }}">Logout</a>
    <a href="{{ route('logout') }}">New</a>

    <h2>Student List</h2>
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
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->math }}</td>
                    <td>{{ $etudiant->info }}</td>
                    <td>{{ ($etudiant->math + $etudiant->info) / 2 }}</td>
                    <td>
                        @php
                            $moyenne = ($etudiant->math + $etudiant->info) / 2;
                            if ($moyenne >= 16) {
                                $mention = 'Très Bien';
                            } elseif ($moyenne >= 14) {
                                $mention = 'Bien';
                            } elseif ($moyenne >= 12) {
                                $mention = 'A Bien';
                            } elseif ($moyenne >= 10) {
                                $mention = 'Passable';
                            } else {
                                $mention = 'Non Admit';
                            }
                        @endphp
                        {{ $mention }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>You are not logged in. Please <a href="{{ route('index') }}">login</a>.</p>
@endif
