<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Przychodnia Medica</title>
        <link rel="stylesheet" href="styl.css">
        <link rel="shortcut icon" href="Obraz2.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <h1>Abonamenty w przychodni Medica</h1>
        </header>
        <article>
            <?php
            $conn=mysqli_connect("localhost","root", "", "medica");

            $abonamenty = mysqli_query($conn, "SELECT nazwa, cena, opis FROM abonamenty");

            $cechy1 = mysqli_query($conn, "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1");
            $cechy2 = mysqli_query($conn, "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 2");
            $cechy3 = mysqli_query($conn, "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 3");

            while($abonament = mysqli_fetch_row($abonamenty)){
                echo "<h3>Pakiet $abonament[0] - cena $abonament[1] zł</h3><p>$abonament[2]</p>";
            }
            ?>
            <a href="opis.html">Dowiedz się więcej</a>
        </article>
        <main>
            <section id="1">
                <h2>Standardowy</h2>
                <ul>
                    <?php
                        while($cechy = mysqli_fetch_row($cechy1)){
                            echo "<li>$cechy[1]</li>";
                        }
                    ?>
                </ul>
            </section>
            <section id="2">
                <h2>Premium</h2>
                <ul>
                    <?php
                        while($cechy = mysqli_fetch_row($cechy2)){
                            echo "<li>$cechy[1]</li>";
                        }
                    ?>
                </ul>
            </section>
            <section id="3">
                <h2>Dziecko</h2>
                <ul>
                    <?php
                        while($cechy = mysqli_fetch_row($cechy3)){
                            echo "<li>$cechy[1]</li>";
                        }
                        mysqli_close($conn);
                    ?>
                </ul>
            </section>
        </main>
        <footer>
            <p><img src="obraz2.png" alt="przychodnia">Stronę przygotował: pc1</p>
        </footer>
    </body>
</html>

