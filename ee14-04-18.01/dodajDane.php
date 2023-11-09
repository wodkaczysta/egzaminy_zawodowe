<?php
$con = mysqli_connect('localhost', 'root', '', 'ogloszenia');
if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['telefon']) && !empty($_POST['email'])) {
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];
	$ask = "INSERT INTO uzytkownik VALUES (NULL, '$imie', '$nazwisko', '$telefon', '$email');";
	mysqli_query($con, $ask);
}
mysqli_close($con);
header('Location: http://localhost/egzamin/rejestracja.html');
exit;
?>