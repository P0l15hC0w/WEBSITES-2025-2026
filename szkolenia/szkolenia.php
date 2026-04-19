<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Firma szkoleniowa</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="baner.jpg" alt="Szkolenia">
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ul>
        </nav>
        <main>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "firma");
                
                $q1 = mysqli_query($conn, "SELECT Data, Temat FROM szkolenia ORDER BY Data ASC");

                while ($row = mysqli_fetch_row($q1)) {
                    echo "<p>$row[0] $row[1]</p>";
                }
            ?>
        </main>
        <footer>
            <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: Pc1</p>
        </footer>
    </body>
</html>

