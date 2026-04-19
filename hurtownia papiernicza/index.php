
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="Stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <nav>
            <h2>Nasze ceny</h2>
            <table>
                <?php
                $conn = mysqli_connect("localhost","root","","sklep");
                $query = mysqli_query($conn, "SELECT nazwa, cena FROM towary WHERE id IN (1, 2, 3, 4)");

                while ($tab = mysqli_fetch_row($query)){
                    echo"<tr>
                        <td>$tab[0]</td>
                        <td>$tab[1]</td>
                    </tr>";
                }
                ?>
            </table>
        </nav>
        <section>
            <h2>Koszt zakupów</h2>
            <form method="post">
                <label for="wybor">wybierz artykuł:</label>
                <select name="wybor">
                    <option>Zeszyt 60 kartek</option>
                    <option>Zeszyt 32 kartki</option>
                    <option>Cyrkiel</option>
                    <option>Linijka 30 cm</option>
                </select>
                <br>
                <label for="ilosc">liczba sztuk:</label>
                <input type="number" name="ilosc" min=1 value=1>
                <br>
                <br>
                <button type="submit">Oblicz</button>
            </form>
            <p>Wartość zakupów: <?php
                if (isset($_POST)) {
                    $wybor = $_POST['wybor'];
                    $ilosc = $_POST['ilosc'];

                    $cenaArr = mysqli_query($conn, "SELECT cena FROM towary WHERE nazwa = '$wybor'");
                    $wartosc = mysqli_fetch_row($cenaArr)[0];
                    
                    echo $wartosc*$ilosc;
                }
                mysqli_close($conn);
            ?></p>
        </section>
        <aside>
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia" width="180px">
            <p>e-mail <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a>
        </aside>
    </main>
    <footer>
        <h4>Witrynę wykonał: pc1</h4>
    </footer>
</body>
</html>
