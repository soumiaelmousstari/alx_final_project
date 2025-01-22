<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Nouveau.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
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
