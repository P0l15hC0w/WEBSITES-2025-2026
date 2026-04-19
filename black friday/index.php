<?php
    mysqli_connect("localhost","root","","sklep")
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sklep dla uczniów</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Dzisiejsze promocje naszego sklepu</h1>
        </header>

        <div id="lewy">
            <h2>Taniej o 30%</h2>
            <ol>a. Gumka do mazania</ol>
            <ol>b. Cienkopis</ol>
            <ol>c. Pisaki 60szt</ol>
            <ol>d. Markery 4szt</ol>
            
        </div>

        <div id="srodkowy">
            <h2>Sprawdź cenę</h2>
            <form action="index.html" method="post">
                <select name="towar" id="towar">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <button type="submit" name="check" id="check">SPRAWDŹ</button>
            </form>
        
        </div>

        <div id="prawy">
            <h2>Kontakt</h2>
            <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja.png" alt="promocja">
        </div>

        <footer>
            <h4>Autor strony:</h4>
        </footer>
    </body>
</html>
