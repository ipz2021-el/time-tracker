<html>
    <head>
        <meta charset="utf-8">
        <title>
            CLOCKER FORMULARZ REJESTRACJI
        </title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
        <script src="registration_utils.js"></script>
    </head>
    <body>
        <div id="banner_rejestracja">
            <!-- do zmiany na cos ladniejszego -->
            <H1>CLOCKER</H1>
            <H2>Rejestracja...</H2>
        </div>
        <form action="registration_script.php" onsubmit="return validate_registration()" method="POST">
            
            <div class="oneinput">
            <label for="imie_">Podaj imię: </label><br>
            <input type="text" name="imie_" placeholder="Jan">
            </div>
                
            <div class="oneinput">
            <label for="nazwisko_">Podaj nazwisko: </label><br>
            <input type="text" name="nazwisko_" placeholder="Kowalski">
            </div>
                    
            <div class="oneinput">
            <label for="adres_ulica_">Podaj nazwę ulicy: </label><br>
            <input type="text" name="adres_ulica_" placeholder="Aleje jerozolimskie">
            </div>
                
            <div class="oneinput">
            <label for="adres_numer_domu_mieszkania">Podaj numer budynku: </label><br>
            <input type="text" id="adres_numer_domu_mieszkania" name="adres_numer_domu_mieszkania_" placeholder="1000">
            </div>
                
            <div class="oneinput">
            <label for="adres_miasto">Podaj nazwę miasta: </label><br>
            <input type="text" id="adres_miasto" name="adres_miasto_" placeholder="Warszawa">
            </div>
                
            <div class="oneinput">
            <label for="adres_kod_pocztowy">Podaj kod pocztowy: </label><br>
            <input type="text" id="adres_kod_pocztowy" name="adres_kod_pocztowy_" placeholder="11-111" pattern="[0-9]{2}-[0-9]{3}"><br>
            <small>Format: 11-111</small>
            </div>
                
            <div class="oneinput">
            <label for="adres_kraj">Podaj nazwę kraju: </label><br>
            <input type="text" id="adres_kraj" name="adres_kraj_" placeholder="Polska">
            </div>
                
                
            <div class="oneinput">
            <label for="email">Podaj email: </label><br>
            <input type="email" id="email" name="email_" placeholder="jan@kowalski.pl">
            </div>
                
            <div class="oneinput">
            <label for="haslo1">Podaj haslo: </label><br>
            <input type="password" id="haslo1" name="haslo1_" placeholder="haslo123!">
            <div id="message">
            <h3>Hasło musi zawierać:</h3>
            <p id="letter" class="invalid">Przynajmniej 1 małą literę</p>
            <p id="capital" class="invalid">Przynajmniej 1 wielką literę</p>
            <p id="number" class="invalid">Przynajmniej 1 cyfrę</p>
            <p id="special_char" class="invalid">Przynajmniej 1 znak specjalny</p>
            <p id="length" class="invalid">Minimum 8 znaków</p>
            </div>
            </div>
                
            <div class="oneinput">
            <label for="haslo2">Podaj haslo: </label><br>
            <input type="password" id="haslo2" name="haslo2_" placeholder="haslo123!">
            </div>
                
            <div class="oneinput">
            <label for="telefon_komorkowy">Podaj telefon komórkowy: </label><br>
            <input type="tel" id="telefon_komorkowy" name="telefon_komorkowy_" placeholder="111-111-111" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"><br>
            <small>Format: 111-111-111</small>
            </div>
                
            <!-- Przycisk WYŚLIJ -->
            <input type="submit" value="Rejestruj użytkownika">
            <!-- Przycisk WYCZYŚĆ DANE -->
            <input type="reset" value="Wyczyść dane">

        </form>

        <form action="index.php" method="GET">
            <input type="submit" value="Strona główna">
        </form>
    </body>
</html>
