<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>OPONY</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <main>
            <aside>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "opony");

                    $q1 = mysqli_query($conn, "SELECT * FROM opony ORDER BY cena ASC LIMIT 10");
                    $q2 = mysqli_query($conn, "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9");
                    $q3 = mysqli_query($conn, "SELECT id, ilosc, model, cena FROM zamowienie LEFT JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1");

                    while ($row = mysqli_fetch_assoc($q1)) {
                        echo "<div class='opona'>";
                        if ($row[3] == 'letnia') {
                            echo "<img src='lato.png' class='ikona'>";
                        } elseif ($row[3] == 'zimowa'){
                            echo "<img src='zima.png' class='ikona'>";
                        } else {
                            echo "<img src='uniwer.png' class='ikona'>";
                        }
                        echo "
                        <h4>Opona: $row[1] $row[2]</h4>
                        <h3>Cena: $row[4]</h3></div>
                        ";
                    }   
                ?>
                <p><a href="https://opona.pl/">więcej ofert</a></p>
            </aside>
            <section id="gora">
                <img src="opona.png" alt="Opona">
                <h2>Opona dnia</h2>
                <br>
                <?php
                    while ($row = mysqli_fetch_row($q2)) {
                        echo"<h2>$row[0] model $row[1]</h2>
                        <h2>Sezon: $row[2]</h2>
                        <h2>Tylko $row[3]zł!</h2>";
                    }
                ?>
            </section>
            <section id="dol">
                <h2>Najnowsze zamówienie</h2>
                <br>
                <?php
                while ($row = mysqli_fetch_row($q3)){
                echo"
                    <h2>$row[0] $row[1] szutki modelu $row[2]</h2>
                    <h2>Wartość zamówienia $row[3]zł</h2>
                ";
                }
                
                ?>
            </section>
        </main>
        <footer>
            <p>Stronę wykonał: pc1</p>
        </footer>
    </body>
</html>