<html>
    <head>
        <meta charset="utf-8">
        <title>CLOCKER STRONA LOGOWANIA</title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>

    <body>
        <?php
            if (isset($_GET["ans"])){
                echo "<p>" . $_GET["ans"] . "</p>";
            }
        ?>
        <form action="login_script.php" onsubmit="return validate_login()" method="POST">
        
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
            <input type="email" id="email" name="email_" placeholder="jan@kowalski.pl">
            </div>
                    
            <div class="oneinput">
            <label for="haslo">Podaj haslo: </label><br>
            <input type="password" id="haslo1" name="haslo_" placeholder="haslo123!">
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
            <input type="email" id="email" name="email_" placeholder="jan@kowalski.pl">
            </div>

            <div>
            <button type="submit">Resetuj hasło</button>
            </div>
        </form>

        <form action="registration.php" method="GET">
            <label for="registration">Nie masz konta? Zarejestruj się!</label><br>
            <input id="registration" type="submit" value="Strona rejestracji">
        </form>
        <form action="index.php" method="GET">
            <label for="mainsite">Powrót na stronę główną </label><br>
            <input id="mainsite" type="submit" value="Strona główna">
        </form>
    </body>
</html>



