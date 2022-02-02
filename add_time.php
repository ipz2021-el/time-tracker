<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            CLOCKER FORMULARZ DODAWANIA CZASU PRACY
        </title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>
    <body>
        <div id="banner_add_time">
            <!-- do zmiany na cos ladniejszego -->
            <H1>CLOCKER</H1>
            <H2>Dodaj czas...</H2>
        </div>
        <form action="add_time_script.php" method="POST">
            
            <div class="oneinput">
            <label for="dzien_start_">Dzień rozpoczęcia: </label><br>
            <input type="text" id="dzien_start" name="dzien_start_" placeholder="1">
            </div>
                
            <div class="oneinput">
            <label for="miesiac_start_">Miesiąc rozpoczęcia: </label><br>
            <input type="text" id="miesiac_start" name="miesiac_start_" placeholder="1">
            </div>
                    
            <div class="oneinput">
            <label for="rok_start_">Rok rozpoczęcia: </label><br>
            <input type="text" id="rok_start" name="rok_start_" placeholder="2022">
            </div>
                
            <div class="oneinput">
            <label for="godzina_start_">Godzina rozpczęcia: </label><br>
            <input type="text" id="godzina_start" name="godzina_start_" placeholder="08">
            </div>
                
            <div class="oneinput">
            <label for="minuta_start_">Minuta rozpoczęcia: </label><br>
            <input type="text" id="minuta_start" name="minuta_start_" placeholder="00">
            </div>
                
            <!-- ================================================= -->
            <!-- ================================================= -->
            <!-- ================================================= -->


            <div class="oneinput">
            <label for="dzien_stop_">Dzień zakończenia: </label><br>
            <input type="text" id="dzien_stop" name="dzien_stop_" placeholder="1">
            </div>
                
            <div class="oneinput">
            <label for="miesiac_stop_">Miesiąc zakończenia: </label><br>
            <input type="text" id="dmiesiac_stop" name="miesiac_stop_" placeholder="1">
            </div>
                    
            <div class="oneinput">
            <label for="rok_stop_">Rok zakończenia: </label><br>
            <input type="text" id="rok_stop" name="rok_stop_" placeholder="2022">
            </div>
                
            <div class="oneinput">
            <label for="godzina_stop_">Godzina zakończenia: </label><br>
            <input type="text" id="godzina_stop" name="godzina_stop_" placeholder="16">
            </div>
                
            <div class="oneinput">
            <label for="minuta_stop_">Minuta zakończenia: </label><br>
            <input type="text" id="minuta_stop" name="minuta_stop_" placeholder="00">
            </div>

            <div class="oneinput">
            <label for="projekt_nazwa_">Nazwa projektu: </label><br>
            <input type="text" id="projekt_nazwa" name="projekt_nazwa_" placeholder="Projekt">
            </div>

            <div class="oneinput">
            <label for="notatka_">Opis czynności: </label><br>
            <input type="text" id="notatka" name="notatka_" placeholder="Wykonałem zadnie....">
            </div>

            <!-- ================================================= -->
            <!-- ================================================= -->
            <!-- ================================================= -->
            
            <!-- Przycisk WYŚLIJ -->
            <input type="submit" value="Dodaj czas pracy">

        </form>

        <form action="private.php" method="GET">
            <label for="private">Powrót na Twoją stronę prywatną </label><br>
            <input id="private" type="submit" value="Strona prywatna">
        </form>
        <form action="index.php" method="GET">
            <label for="mainsite">Powrót na stronę główną </label><br>
            <input id="mainsite" type="submit" value="Strona główna">
        </form>
    </body>
</html>
