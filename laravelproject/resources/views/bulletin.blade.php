<!DOCTYPE html>
<html>
<head>
    <title>Bulletin</title>
</head>
<body>
    <h1>Student Grade</h1>
    <p>Name: {{ $etudiant->nom }}</p>
    <p>Math Grade: {{ $etudiant->math }}</p>
    <p>Info Grade: {{ $etudiant->info }}</p>
    <p>Moyenne: {{ $moyenne }}</p>
    <p>Mention: {{ $mention }}</p>
</body>
</html>