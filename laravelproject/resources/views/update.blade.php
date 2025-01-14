<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Nouveau.css') }}">
    <title>Formulaire Étudiant</title>
    <script>
        function validateForm(event) {
            const nom = document.querySelector('[name="nom_etu"]').value.trim();
            const noteMath = document.querySelector('[name="note_math"]').value.trim();
            const noteInfo = document.querySelector('[name="note_info"]').value.trim();
            if (!nom || isNaN(noteMath) || isNaN(noteInfo) || noteMath < 0 || noteMath > 20 || noteInfo < 0 || noteInfo > 20) {
                event.preventDefault();
                alert("Veuillez remplir tous les champs correctement.\n- Le nom est obligatoire.\n- Les notes doivent être des nombres entre 0 et 20.");
            }
        }
    </script>
</head>
<body>
    <form class="add" action="{{ route('etudiant.update') }}" method="POST" onsubmit="validateForm(event)">
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
