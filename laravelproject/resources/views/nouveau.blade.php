<!DOCTYPE html><!--Define the htnl decument-->
<html lang="en"><!--Define that the langage of coding is frensh-->
    <head>
        <meta charset="UTF-8"><!-- Specifies the character encoding as UTF-8 -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Makes the page responsive to different screen sizes -->
        <link rel="stylesheet" href="{{ asset('css/Nouveau.css') }}"><!-- Links the main stylesheet for the page -->
        <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}"><!-- Links the stylesheet for the header and footer -->
        <title>Formulaire Étudiant</title>
        <script>
            function validateForm(event) {
                //The document.querySelector('[name="field_name"]').value method is used to access the value of an input field in the form.
                //The .trim() method removes any extra spaces at the beginning and end of the input string.
                const nom = document.querySelector('[name="nom_etu"]').value.trim();
                const noteMath = document.querySelector('[name="note_math"]').value.trim();
                const noteInfo = document.querySelector('[name="note_info"]').value.trim();
                if (!nom || isNaN(noteMath) || isNaN(noteInfo) || noteMath < 0 || noteMath > 20 || noteInfo < 0 || noteInfo > 20) {
                    event.preventDefault();
                //event.preventDefault() is a JavaScript method that prevents the default action of an event from occurring.
                //For forms, the default action is to submit the form and reload the page or send data to the server.
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
                <ul><!-- Navigation menu with links to different sections -->
                    <li><a href="{{ route('acceuill') }}">Home</a></li><!-- Navigation link to the homepage. -->
                    <li><a href="{{ route('acceuill') }}#features">Features</a></li><!-- Navigation link to the Feature section where exists on acceuill page. -->
                    <li><a href="{{ route('acceuill') }}#how-it-works">How It Works</a></li><!-- Navigation link to the How It Works section where exists on acceuill page. -->
                    <li><a href="{{ route('acceuill') }}#cta">Get Started</a></li><!-- Navigation link to the Get Started section where exists on acceuill page. -->
                    <li><a href="#footer">Contact Us</a></li><!-- Navigation link to the Contact Us section where exists on footer section. -->
                </ul>
            </nav>
        </header>
        <form class="add" action="{{ isset($etudiant) ? route('etudiant.update', $etudiant->id) : route('etudiant.add') }}" method="POST" onsubmit="validateForm(event)">
            <!--
                The form element is used to collect user input and send it to the server for processing. 
                This specific form has the following attributes:
                method="POST": 
                - Specifies the HTTP method used to send the form data. 
                - "POST" is used here because it is more secure for sending sensitive or large amounts of data (e.g., passwords, personal details) compared to "GET", as it does not append data to the URL.
                onsubmit="validateForm(event)": 
                - This attribute binds a JavaScript function `validateForm(event)` to the form submission process.
                - When the user clicks the submit button, the `onsubmit` event is triggered, and the `validateForm` function is executed.
                - The `event` parameter in the function allows the script to control the submission process (e.g., using `event.preventDefault()` to prevent submission if validation fails).
            -->
            @csrf<!-- Adds a CSRF token for security to protect against cross-site request forgery attacks. -->
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
                <input class="button" type="submit" value="Valider"><!-- Submit button for validating the form and sending the data to the server. -->
                <a class="href" href="{{ route('affichage') }}"><input class="button" type="button" value="Annuler"></a>
            </div>
        </form>
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
