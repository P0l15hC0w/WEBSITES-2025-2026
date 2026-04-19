<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Nasz sklep komputerowy</title>
        <link rel="stylesheet" href="styl8.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php">Główna</a>
                <a href="procesory.html">Procesory</a>
                <a href="ram.html">RAM</a>
                <a href="grafika.html">Grafika</a>
            </nav>
            <section>
                <h2>Podzespoły komputerowe</h2>
            </section>
        </header>
        <main>
            <h1>Dzisiejsze promocje</h1>
            <table>
                <thead>
                    <tr>
                        <td>NUMER</td>
                        <td>NAZWA PODZESPOŁU</td>
                        <td>OPIS</td>
                        <td>CENA</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "sklep");

                    $q1 = mysqli_query($conn, "SELECT id, nazwa, opis, cena FROM podzespoly WHERE cena < 1000");
                    while ($row = mysqli_fetch_row($q1)){
                        echo "
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                        </tr>
                        ";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
                
            </table>
        </main>
        <footer>
            <section>
                <img src="scalak.jpg" alt="promocje na procesory">
            </section>
            <section>
                <h4>Nasz Sklep Komputerowy</h4>
                <p>Wspolpracujemy z hurtownia <a href="http://www.edata.pl/">edata</a></p>
            </section>
            <section>
                <p>zadzwoń: 601 602 603</p>
            </section>
            <section>
                <p>Stronę wykonał: Pc1</p>
            </section>
        </footer>
    </body>
</html>