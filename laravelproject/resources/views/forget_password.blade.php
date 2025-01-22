<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
    <title>Formulaire Étudiant</title>
    <script>
        function validateForm(event) {
            const code = document.querySelector('[name="code_utili"]').value.trim();
            const email = document.querySelector('[name="email_utili"]').value.trim();
            const mot_de_pass = document.querySelector('[name="mot_utili"]').value.trim();
            const mot_de_pass_retrype = document.querySelector('[name="mot_utili_reteype"]').value.trim();
            const codeRegex = /^\d{5}$/;
            if (!mot_de_pass_retrype || !mot_de_pass || !email || isNaN(code) || !codeRegex.test(code)) {
                event.preventDefault();
                if (mot_de_pass_retrype != mot_de_pass)
                    alert("Les mots de passe ne sont pas la meme.");
                else
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
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('acceuill') }}#features">Features</a></li>
                <li><a href="{{ route('acceuill') }}#how-it-works">How It Works</a></li>
                <li><a href="#footer">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <form class="add" method="POST" onsubmit="validateForm(event)">
        @csrf
        <label for="code_utili">Magic code</label>
        <input type="text" id="code_utili" name="code_utili" required>
        
        <label for="email_utili">Email</label>
        <input type="email" id="email_utili" name="email_utili" required>

        <label for="mot_utili">New Mot de passe</label>
        <input type="password" id="mot_utili" name="mot_utili" required>

        <label for="mot_utili">Retrype New Mot de Passe</label>
        <input type="password" id="mot_utili" name="mot_utili_reteype" required>

        <div class="button-container">
            <a class="href" href="{{ route('login') }}"><input class="button" type="button" value="Annuler"></a>
            <input class="button" type="submit" value="Valider">
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
