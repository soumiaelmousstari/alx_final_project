@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="menu menu-item__specify">
        <li class="menu-item">Nom</li>
        <li class="menu-item">Maths</li>
        <li class="menu-item">Informatique</li>
        <li class="menu-item">Moyenne</li>
        <li class="menu-item">Mention</li>
    </ul>

    @foreach($etudiants as $etudiant)
        @php
            $moyenne = ($etudiant->math + $etudiant->info) / 2;
            $mention = $moyenne >= 16 ? 'Très Bien' :
                       ($moyenne >= 14 ? 'Bien' :
                       ($moyenne >= 12 ? 'Assez Bien' : 'Passable'));
        @endphp

        <div class="menu-container">
            <ul class="menu">
                <li class="menu-item">{{ $etudiant->nom }}</li>
                <li class="menu-item">{{ $etudiant->math }}</li>
                <li class="menu-item">{{ $etudiant->info }}</li>
                <li class="menu-item">{{ $moyenne }}</li>
                <li class="menu-item">{{ $mention }}</li>
            </ul>
            <div class="button">
                <a href="{{ route('etudiants.bulletin', $etudiant->id) }}"><input type="button" value="I"></a>
                <a href="{{ route('etudiants.delete', $etudiant->id) }}"><input type="button" value="S"></a>
            </div>
        </div>
    @endforeach
</div>
@endsection
