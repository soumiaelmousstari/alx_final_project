<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Nouveau.css') }}">
    <title>Formulaire Étudiant</title>
</head>
<body>
    <form class="add" action="{{ route('etudiant.update') }}" method="POST">
        @csrf
        @method('PUT')
        @if(isset($etudiant))
            <input type="hidden" name="id_to_modify" value="{{ $etudiant->id }}">
        @endif
        <label>Nom de l'Étudiant</label>
        <input type="text" name="nom_etu" value="{{  $etudiant->nom_etu }}" required>
        <label>Note Maths</label>
        <input type="text" name="note_math" value="{{ old('note_math', $etudiant->note_math ?? '') }}" required>

        <label>Note Informatique</label>
        <input type="text" name="note_info" value="{{ old('note_info', $etudiant->note_info ?? '') }}" required>

        <div class="button-container">
            <input class="button" type="submit" value="Valider">
            <a class="href" href="{{ route('affichage') }}"><input class="button" type="button" value="Annuler"></a>
        </div>
    </form>
</body>
</html>
