<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/acceuill.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
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
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="#cta">Get Started</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
    </header>
<main>
    <section class="hero">
        <h1>Welcome to Student Management</h1>
        <p>Manage student information efficiently and securely.</p> 
        <a href="#features" class="btn">Explore Features</a>
    </section>
    <section id="features" class="features">
        <h2>Features</h2>
        <div class="feature-items">
            <div class="feature-item">
                <h3>Add a Student</h3>
                <p>Add student information, including their name and grades in IT and Mathematics.</p>
            </div>
            <div class="feature-item">
                <h3>Edit or Delete</h3>
                <p>Update or delete student records effortlessly.</p>
            </div>
            <div class="feature-item">
                <h3>Generate Reports</h3>
                <p>Create and download student reports in PDF format.</p>
            </div>
        </div>
    </section>
    <section id="how-it-works" class="how-it-works">
        <h2>How It Works</h2>
        <ol>
            <li>Log in to your secure account.</li>
            <li>Add or edit student information via the form.</li>
            <li>Download student reports in one click.</li>
        </ol>
    </section>
    <section id="cta" class="cta">
        <h2>Ready to get started?</h2>
        <p>Sign up or log in to manage student records now.</p>
        <a href="{{ route('register') }}" class="btn">S'inscrire</a>
        <a href="{{ route('login') }}" class="btn">Se connecter</a>
    </section>
</main>
<footer>
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
                <li><a href="#"><img src="facebook-icon.png" alt="Facebook"></a></li>
                <li><a href="#"><img src="twitter-icon.png" alt="Twitter"></a></li>
                <li><a href="#"><img src="instagram-icon.png" alt="Instagram"></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2025 Bschool. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
