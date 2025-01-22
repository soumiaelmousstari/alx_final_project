<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/affichage_css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
    <title>Liste des Étudiants</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a class="href" href="{{ route('acceuill') }}">Bschool</a>
            </div>
            <ul>
                <li><a href="{{ route('acceuill') }}">Home</a></li>
                <li><a href="{{ route('acceuill') }}#features">Features</a></li>
                <li><a href="{{ route('acceuill') }}#how-it-works">How It Works</a></li>
                <li><a href="{{ route('acceuill') }}#cta">Get Started</a></li>
                <li><a href="#footer">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
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
    </main>
<footer id="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h4>About Us</h4>
            <ul>
                <li class="li1">
                    <a>Our Story</a>
                    <p class="info-paragraph">We are a dedicated team, committed to providing quality education. Our journey began in 2010, with the vision to transform education through technology and innovation.</p>
                </li>
                <li>
                    <a>Careers</a>
                    <p class="info-paragraph">Join our dynamic team of educators and innovators. Explore exciting career opportunities and help us shape the future of education.</p>
                </li>
                <li>
                    <a>Privacy Policy</a>
                    <p class="info-paragraph">Your privacy is of utmost importance to us. Our privacy policy explains how we collect, use, and protect your personal information.</p>
                </li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Customer Support</h4>
            <ul>
                <li>
                    <a>Help Center</a>
                    <p class="info-paragraph">If you have any questions or need assistance, our Help Center is here to guide you through any issues you may encounter.</p>
                </li>
                <li>
                    <a>Contact Us</a>
                    <p class="info-paragraph">Feel free to reach out to us. We’re here to help with any inquiries you have.</p>
                </li>     
            </ul>
        </div>
        <div class="footer-section">
            <h4>Contact</h4>
            <p>📞 Support: +1 (800) 123-4567</p>
            <p>📧 Email: support@bschool.com</p>
        </div>
        <div class="footer-section">
            <h4>Follow Us</h4>
            <ul class="social-links">
                <li><a href="#"><img src="{{ asset('image/Facebook.png') }}" alt="Facebook"></a></li>
                <li><a href="#"><img src="{{ asset('image/Twitter.png') }}" alt="Twitter"></a></li>
                <li><a href="#"><img src="{{ asset('image/Instagram.png') }}" alt="Instagram"></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2025 Bschool. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
