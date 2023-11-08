<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biblioteka</title>
</head>
<body>
    <div id="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </div>
    <div id="left">
        <h2>Dodaj czytelnika</h2>
        <form method="post">
            Imie<input type="text" name="imie"><br>
            Nazwisko<input type="text" name="nazwisko"><br>
            Rok urodzenia<input type="number" name="rok_uro"><br>
            <input type="submit" value="DODAJ">
    </form>
    </div>
    <div id="center">
    <img src="biblioteka.png" alt="biblioteka">
    <h4>ul. Czytelnicza 25 <br>
        12-120 Książkowice <br>
        tel.: 123123123 <br>
        e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></h4>
    </div>
    <div id="right">
    <h3>Nasi czytelnicy</h3>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'biblioteka');
    $ask1 = "SELECT imie, nazwisko from czytelnicy";
    $result1 = mysqli_query($con, $ask1);
    while ($row = mysqli_fetch_array($result1)) {
    echo '<li>'. $row[0]. ' '. $row[1] .'</li>';
    }
    mysqli_close($con);
    ?>
    </div>
    <div id="footer">
        <p>Projekt witryny: 00000000000</p>
    </div>
    <?php
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $rok_uro = $_POST['rok_uro'];

        $poczatkoweLiteryImienia = strtolower(substr($imie, 0, 2));
        $dwieOstatnieCyfryRoku = substr(strval($rok_uro), 0, 2);
        $poczatkoweLiteryNazwiska = strtolower(substr($nazwisko, 0, 2));

        $kod_czytelnika = $poczatkoweLiteryImienia . $dwieOstatnieCyfryRoku . $poczatkoweLiteryNazwiska;
        
        $con = mysqli_connect("localhost", "root", "", "biblioteka");
        $ask0 = "INSERT INTO czytelnicy (imie, nazwisko, rok_uro, kod_czytelnika) VALUES ('$imie', '$nazwisko', $rok_uro, '$kod_czytelnika')";
    $result0 = mysqli_query($con, $ask0);

    if ($result0) {
    echo 'Czytelnik został dodany!';
    } else {
    echo 'Błąd podczas dodawania czytelnika: ' . mysqli_error($con);
    }

        mysqli_close($con);
        ?>
</body>
</html>