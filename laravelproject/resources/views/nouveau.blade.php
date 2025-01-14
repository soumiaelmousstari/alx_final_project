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
<form class="add" action="{{ isset($etudiant) ? route('etudiant.update', $etudiant->id) : route('etudiant.add') }}" method="POST" onsubmit="validateForm(event)">
    @csrf
    @if(isset($etudiant))
        @method('PUT')
    @endif
    <label for="nom_etu">Nom de l'Étudiant</label>
    <input type="text" id="nom_etu" name="nom_etu" value="{{ $etudiant->nom ?? '' }}" required>
    
    <label for="note_math">Note Maths</label>
    <input type="text" id="note_math" name="note_math" value="{{ $etudiant->math ?? '' }}" min="0" max="20" required>
    
    <label for="note_info">Note Informatique</label>
    <input type="text" id="note_info" name="note_info" value="{{ $etudiant->info ?? '' }}" min="0" max="20" required>
    <div class="button-container">
        <input class="button" type="submit" value="Valider">
        <a class="href" href="{{ route('affichage') }}"><input class="button" type="button" value="Annuler"></a>
    </div>
</form>
</body>
</html>
