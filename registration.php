<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>FORMULARZ REJESTRACJI</title> </head>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
<body>
    
        <div>
            
            FORMULARZ REJESTRACJI
            
        </div>
        <!-- tego nie wiem czy to jest ok-->
        <form action="post_registration.php" onsubmit="return validate_registration()" method="post" enctype="text/plain"><div>
            
            <!-- Podstawowe pole tekstowe -->
            <div class="oneinput">
            <label for="imie">Podaj imię: </label><br>
            <input type="text" id="imie" name="imie" placeholder="Jan">
            </div>
            
            <div class="oneinput">
            <label for="nazwisko">Podaj nazwisko: </label><br>
            <input type="text" id="nazwisko" name="nazwisko" placeholder="Kowalski">
            </div>
                
            <div class="oneinput">
            <label for="adres_ulica">Podaj nazwę ulicy: </label><br>
            <input type="text" id="adres_ulica" name="adres_ulica" placeholder="Aleje jerozolimskie">
            </div>
            
            <div class="oneinput">
            <label for="adres_numer_domu_mieszkania">Podaj numer budynku: </label><br>
            <input type="text" id="adres_numer_domu_mieszkania" name="adres_numer_domu_mieszkania" placeholder="1000">
            </div>
            
            <div class="oneinput">
            <label for="adres_miasto">Podaj nazwę miasta: </label><br>
            <input type="text" id="adres_miasto" name="adres_miasto" placeholder="Warszawa">
            </div>
            
            <div class="oneinput">
            <label for="adres_kod_pocztowy">Podaj kod pocztowy: </label><br>
            <input type="text" id="adres_kod_pocztowy" name="adres_kod_pocztowyy" placeholder="11-111" pattern="[0-9]{2}-[0-9]{3}"><br>
            <small>Format: 11-111</small>
            </div>
            
            <div class="oneinput">
            <label for="adres_kraj">Podaj nazwę kraju: </label><br>
            <input type="text" id="adres_kraj" name="adres_kraj" placeholder="Polska">
            </div>
            
            
            <div class="oneinput">
            <label for="email">Podaj email: </label><br>
            <input type="text" id="email" name="email" placeholder="jan@kowalski.pl">
            </div>
            
            <div class="oneinput">
            <label for="haslo">Podaj haslo: </label><br>
            <input type="text" id="haslo" name="haslo" placeholder="haslo123!">
            </div>
            
            <div class="oneinput">
            <label for="haslo">Podaj haslo: </label><br>
            <input type="text" id="haslo" name="haslo" placeholder="haslo123!">
            </div>
            
            <div class="oneinput">
            <label for="telefon_komorkowy">Podaj telefon komórkowy: </label><br>
            <input type="tel" id="telefon_komorkowy" name="telefon_komorkowy" placeholder="111-111-111" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"><br>
            <small>Format: 111-111-111</small>
            </div>
            
        <!-- Przycisk WYŚLIJ -->
        <input type="submit" value="Rejestruj użytkownika">
        <!-- Przycisk WYCZYŚĆ DANE -->
        <input type="reset" value="Wyczyść dane">
        </div></form>
    
    

</body>
</html>



