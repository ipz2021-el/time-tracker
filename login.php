<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>STRONA LOGOWANIA</title> 
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>
<body>
    
        <div>
            STRONA LOGOWANIA
        </div>
        <!-- tego nie wiem czy to jest ok-->
        <form action="private.php" onsubmit="return validate_login()" method="post" enctype="text/plain">
            <div>
                <!-- Podstawowe pole tekstowe -->
                <div class="oneinput">
                    <label for="email">Podaj email (login): </label><br>
                    <input type="text" id="email" name="email" placeholder="jan@kowalski.pl">
                </div>
                
                <div class="oneinput">
                    <label for="haslo">Podaj haslo: </label><br>
                    <input type="text" id="haslo" name="haslo" placeholder="haslo123!">
                </div>
                <!-- Przycisk WYŚLIJ -->
                <div>
                    <input type="submit" value="Zaloguj">
                </div>
                <!-- Przycisk WYCZYŚĆ DANE -->
                <div>
                    <input type="reset" value="Wyczyść dane">
                </div>
            </div>
        </form>
        <form method="get" action="reset_password.php">
            <!-- Przycisk RESETUJ HASLO-->
            <div>
                <button type="submit">Resetuj hasło</button>
            </div>
        </form>
    
</body>
</html>



