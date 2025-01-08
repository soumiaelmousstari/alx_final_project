<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de l'Etudiant</title>
</head>
<body>
    <div class="container">
        <h1>Bulletin de l'Etudiant</h1>

        <div class="row">
            <div class="col-md-6">
                <h3>Informations de l'étudiant</h3>
                <table class="table">
                    <tr>
                        <th>Nom</th>
                        <td>{{ $etudiant->nom }}</td>
                    </tr>
                    <tr>
                        <th>Mathématiques</th>
                        <td>{{ $etudiant->math }}</td>
                    </tr>
                    <tr>
                        <th>Informatique</th>
                        <td>{{ $etudiant->info }}</td>
                    </tr>
                    <tr>
                        <th>Moyenne</th>
                        <td>{{ number_format(($etudiant->math + $etudiant->info) / 2, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Mention</th>
                        <td>
                            @php
                                $moyenne = ($etudiant->math + $etudiant->info) / 2;
                                if ($moyenne >= 10 && $moyenne < 12) {
                                    echo "Passable";
                                } elseif ($moyenne >= 12 && $moyenne < 14) {
                                    echo "Assez Bien";
                                } elseif ($moyenne >= 14 && $moyenne < 16) {
                                    echo "Bien";
                                } elseif ($moyenne >= 16 && $moyenne <= 20) {
                                    echo "Très Bien";
                                } else {
                                    echo "Non Admis";
                                }
                            @endphp
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <h3>Actions</h3>
                <p>
                    <a href="{{ route('etudiant.bulletin', $etudiant->id) }}" class="btn btn-primary">Télécharger le Bulletin en PDF</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
