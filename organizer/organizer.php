<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Organizer</title>
        <link rel="stylesheet" href="styl6.css">
    </head>
    <body>
        <header>
            <section>
                <h2>MÓJ ORGANIZER</h2>
            </section>
            <section>
                <form method="post">
                    <label for="wpis">Wpis wydarzenia:</label>
                    <input type="text" name="wpis">
                    <button type="submit">ZAPISZ</button>
                </form>
            </section>
            <section>
                <img src="logo2.png" alt="Mój organizer">
            </section>
        </header>
        <main>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "egzamin6");
                
                $q1 = mysqli_query($conn, "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';");
                $q2 = mysqli_query($conn, "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01'");
                
                if (isset($_POST['wpis'])){
                    $wpis = $_POST['wpis'];
                    mysqli_query($conn, "UPDATE zadania SET wpis='$wpis' WHERE dataZadania='2020-08-27'");
                }

                while ($row = mysqli_fetch_row($q1)) {
                    echo "
                    <section>
                        <h6>$row[0], $row[1]</h6>
                        <p>$row[2]</p>
                    </section>";
                }
            ?>
        </main>
        <footer>
            <?php
                while ($row = mysqli_fetch_row($q2)){
                    echo "
                    <h1>miesiac: $row[0], rok: $row[1]</h1>
                    ";
                }
                mysqli_close($conn);
            ?>
            <p>Stronę wykonał: pc1</p>
        </footer>
    </body>
</html>