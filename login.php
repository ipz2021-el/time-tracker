<html>
    <head>
        <title>
            STRONA LOGOWANIA
        </title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>
    <body>
        <form action="login_script.php" onsubmit="return validate_login()" method="GET">
        
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
            <div>
            <button type="submit">Resetuj hasło</button>
            </div>
        </form>
    </body>
</html>



