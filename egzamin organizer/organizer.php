<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
    <section id="baner">
        <h1>Organizer: SIERPIEŃ</h1>
    </section>
    <section id="baner1">
        <form action=organizer.php method="post">
        <input type="text" name="wpis" placeholder="Zapisz wydarzenie">
        <button name="submit">OK</button>
        </form>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'kalendarz');
        if (isset($_POST['submit'])){
            $wpis = $_POST['wpis'];
            $q1 = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-09'";
                mysqli_query($con, $q1);
        }
        mysqli_close($con);
        ?>
    </section>
    <section id="baner2">
        <img src="" alt="sierpień" >
    </section>
    </header>
    <main>
    <?php
        $con = mysqli_connect('localhost', 'root', '', 'kalendarz');
        $q = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien'";
        $pol = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($pol)) {
            echo "<section class='kalendarz'>
                    <h5>$row[0]</h5>
                    <p>$row[1]</p>
                </section>";
        }
        mysqli_close($con);
        ?>
    </main>
    <section id="footer">
        <p>Stronę wykonał: 00000000000</p>
    </section>
</body>
</html>