<!DOCTYPE html><!--Define the htnl decument-->
<html lang="en"><!--Define that the langage of coding is english-->
    <head>
        <meta charset="UTF-8"><!-- Specifies the character encoding as UTF-8 -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Makes the page responsive to different screen sizes -->
        <title>Accueil</title><!-- Sets the title of the page -->
        <link rel="stylesheet" href="{{ asset('css/acceuill.css') }}"><!-- Links the main stylesheet for the page -->
        <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}"><!-- Links the stylesheet for the header and footer -->
        <title>Acceuill</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="logo">
                    <a class="href" href="{{ route('acceuill') }}">Bschool</a>
                </div>
                <ul><!-- Navigation menu with links to different sections -->
                    <li><a href="{{ route('acceuill') }}">Home</a></li><!-- Navigation link to the homepage. -->
                    <li><a href="{{ route('login') }}">Login</a></li><!-- Navigation link to the login page. -->
                    <li><a href="{{ route('register') }}">Register</a></li><!-- Navigation link to the register page. -->
                    <li><a href="{{ route('acceuill') }}#features">Features</a></li><!-- Navigation link to the Feature section where exists on acceuill page. -->
                    <li><a href="{{ route('acceuill') }}#how-it-works">How It Works</a></li><!-- Navigation link to the How It Works section where exists on acceuill page. -->
                    <li><a href="{{ route('acceuill') }}#cta">Get Started</a></li><!-- Navigation link to the Get Started section where exists on acceuill page. -->
                    <li><a href="#footer">Contact Us</a></li><!-- Navigation link to the Contact Us section where exists on footer section. -->
                </ul>
            </nav>
        </header>
        <main><!-- Main content area of the page -->
            <section class="hero"><!-- Hero section introducing the website -->
                <h1>Welcome to Student Management</h1>
                <p>Manage student information efficiently and securely.</p> 
                <a href="#features" class="btn">Explore Features</a><!-- Button linking to the Features section -->
            </section>
            <section id="features" class="features"><!-- Features section -->
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
            <section id="how-it-works" class="how-it-works"><!-- How It Works section -->
                <h2>How It Works</h2>
                <ol>
                    <li>Log in to your secure account.</li>
                    <li>Add or edit student information via the form.</li>
                    <li>Download student reports in one click.</li>
                </ol>
            </section>
            <section id="cta" class="cta"><!-- Call to action (CTA) section -->
                <h2>Ready to get started?</h2>
                <p>Sign up or log in to manage student records now.</p>
                <a href="{{ route('register') }}" class="btn">Register</a><!--The register button-->
                <a href="{{ route('login') }}" class="btn">Login</a><!--The login button-->
            </section>
        </main>
        <footer id="footer"><!--Footer section-->
            <div class="footer-container">
                <div class="footer-section">
                    <h4>About Us</h4><!-- About Us section -->
                    <ul>
                        <li class="li1">
                            <a>Our Story</a><!-- Link for the company's story -->
                            <p class="info-paragraph">We are a dedicated team, committed to providing quality education. Our journey began in 2010, with the vision to transform education through technology and innovation.</p>
                        </li>
                        <li>
                            <a>Careers</a><!-- Link for career opportunities -->
                            <p class="info-paragraph">Join our dynamic team of educators and innovators. Explore exciting career opportunities and help us shape the future of education.</p>
                        </li>
                        <li>
                            <a>Privacy Policy</a><!-- Link to the privacy policy -->
                            <p class="info-paragraph">Your privacy is of utmost importance to us. Our privacy policy explains how we collect, use, and protect your personal information.</p>
                        </li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Customer Support</h4><!-- Customer Support section -->
                    <ul>
                        <li>
                            <a>Help Center</a><!-- Link to the help center -->
                            <p class="info-paragraph">If you have any questions or need assistance, our Help Center is here to guide you through any issues you may encounter.</p>
                        </li>
                        <li>
                            <a>Contact Us</a><!-- Link for contacting support -->
                            <p class="info-paragraph">Feel free to reach out to us. We’re here to help with any inquiries you have.</p>
                        </li>     
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4><!-- Contact section -->
                    <p>📞 Support: +1 (800) 123-4XXX</p><!-- Support contact number -->
                    <p>📧 Email: support@bschool.com</p><!-- Support email address -->
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4><!-- Social media section -->
                    <ul class="social-links">
                        <li><a href="#"><img src="{{ asset('image/Facebook.png') }}" alt="Facebook"></a></li>
                        <li><a href="#"><img src="{{ asset('image/Twitter.png') }}" alt="Twitter"></a></li>
                        <li><a href="#"><img src="{{ asset('image/Instagram.png') }}" alt="Instagram"></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Bschool. All rights reserved.</p><!-- Copyright notice -->
            </div>
        </footer>
    </body>
</html>
