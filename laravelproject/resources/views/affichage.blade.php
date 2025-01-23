<!DOCTYPE html><!--Define the htnl decument-->
<html lang="en"><!--Define that the langage of coding is frensh-->
    <head>
        <meta charset="UTF-8"><!-- Specifies the character encoding as UTF-8 -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Makes the page responsive to different screen sizes -->
        <link rel="stylesheet" href="{{ asset('css/affichage_css.css') }}"><!-- Links the main stylesheet for the page -->
        <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}"><!-- Links the stylesheet for the header and footer -->
        <title>Liste des Étudiants</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="logo">
                    <a class="href" href="{{ route('acceuill') }}">Bschool</a>
                </div>
                <ul><!-- Navigation menu with links to different sections -->
                    <li><a href="{{ route('acceuill') }}">Home</a></li><!-- Navigation link to the homepage. -->
                    <li><a href="{{ route('acceuill') }}#features">Features</a></li><!-- Navigation link to the Feature section where exists on acceuill page. -->
                    <li><a href="{{ route('acceuill') }}#how-it-works">How It Works</a></li><!-- Navigation link to the How It Works section where exists on acceuill page. -->
                    <li><a href="{{ route('acceuill') }}#cta">Get Started</a></li><!-- Navigation link to the Get Started section where exists on acceuill page. -->
                    <li><a href="#footer">Contact Us</a></li><!-- Navigation link to the Contact Us section where exists on footer section. -->
                </ul>
            </nav>
        </header>
        <main><!-- Main content area of the page -->
            <a id="a1" href="{{ route('logout') }}">Logout</a><!-- Logout link that redirects to the logout route -->
            <a id="a2" href="{{ url('nouveau') }}">New</a><!-- Link to create a new student record -->
            <h1>Liste des Étudiants</h1>
            <table>
                <thead>
                    <tr>
                         <!-- Table headers for student name, math score, computer science score, average score, and mention -->
                        <th>Nom</th>
                        <th>Maths</th>
                        <th>Informatique</th>
                        <th>Moyenne</th>
                        <th>Mention</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant) <!-- Loop through each student in the $etudiants array -->
                        <tr>
                             <!-- Display student data -->
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->math }}</td>
                            <td>{{ $etudiant->info }}</td>
                            <td>{{ $moyenne = ($etudiant->math + $etudiant->info) / 2 }}</td>
                            <td>
                                @php
                                    // Check the average score to determine the mention
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
                                @csrf<!-- Adds a CSRF token for security to protect against cross-site request forgery attacks. -->
                                @method('PUT')
                                <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="POST" style="display:inline;">
                                    @csrf<!-- Adds a CSRF token for security to protect against cross-site request forgery attacks. -->
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
