<html>
    <head>
        <meta charset="utf-8">
        <title>Clocker logowanie</title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>

    <body>
        <form action="login_script.php" onsubmit="return validate_login()" method="GET">
        
            <div id="banner_logowanie">
                <!-- do zmiany na cos ladniejszego -->
                <H1>CLOCKER</H1>
            </div>
            <div id="banner_logowanie_opis">
                <!-- do zmiany na cos ladniejszego -->
                <H2>Logowanie...</H2>
            </div>

            <div class="oneinput">
            <label for="email">Podaj email: </label><br>
            <input type="text" id="email" name="email_" placeholder="jan@kowalski.pl">
            </div>
                    
            <div class="oneinput">
            <label for="haslo1">Podaj haslo: </label><br>
            <input type="text" id="haslo1" name="haslo1_" placeholder="haslo123!">
            </div>
            
            <!-- Przycisk WYŚLIJ -->
            <div>
            <input type="submit" value="Zaloguj">
            </div>
            <!-- Przycisk WYCZYŚĆ DANE -->
            <div>
            <input type="reset" value="Wyczyść dane">
            </div>
        </form>

        <form action="reset_password_script.php" method="GET">
            <!-- Przycisk RESETUJ HASLO-->

            <div class="oneinput">
                Aby zresetować hasło wpisz email i naciśnij resetuj...
            </div>

            <div class="oneinput">
            <label for="email">Resetuj email: </label><br>
            <input type="text" id="email" name="email_" placeholder="jan@kowalski.pl">
            </div>

            <div>
            <button type="submit">Resetuj hasło</button>
            </div>
        </form>

        <form action="index.php" method="GET">
            <input type="submit" value="Strona główna">
        </form>
    </body>
</html>



