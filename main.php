<!DOCTYPE HTML>
<html lang="pl">
<head>
<title>Organizer Weselny</title>
<meta charset="utf-8"/>
<meta name="description" content="Zaplanuj swoje wesele i ślub w najdrobniejszych szczegółach"/>
<meta name="keywords" content="organizacja,wesele,ślub,poprawiny,planowanie"/>
<meta http-equiv="X-UA Compatible" content="IE=edge,chrome=1"/>

</head>

<body>

<?php
	require_once "wesele_fabryka.php";
	require_once "show_guest.php";
	
	$konto=$_SESSION['konto'];
	$database=new Database("localhost","root","","wesele");
	$wesele_fabryka=new Wesele_fabryka($database);
	$wesele=$wesele_fabryka->stworzWesele($konto);
	
	echo "Wesele ";
	$wesele->pokaz("mlody");
	echo " i ";
	$wesele->pokaz("mloda");
	echo". Data: ";
	$wesele->pokaz("data");
	

	
	
	
?>

<h1>Dodaj gościa</h1>
<form method="post" action="skrypt.php">
		Imię i Nazwisko: <input type="text" name="name"/></br></br>
		Osoba towarzysząca: <input type="radio" name="partner" value="TAK"/>TAK	
							<input type="radio" name="partner" value="NIE"/>NIE </br></br>
		Dzieci:	<input type="radio" name="children" value="TAK"/>TAK	
				<input type="radio" name="children" value="NIE"/>NIE </br></br>
		Liczba dzieci: <input type="text" name="num_child" placeholder="0"/></br></br>
		Od kogo: <input type="radio" name="from_who" value="<?php $wesele->pokaz("mlody"); ?>"/><?php $wesele->pokaz("mlody"); ?>	
				 <input type="radio" name="from_who" value="<?php $wesele->pokaz("mloda"); ?>"/><?php $wesele->pokaz("mloda"); ?>
				 <input type="radio" name="from_who" value="Wspólny"/>Wspólny </br></br>
				 <input type="submit" value="Dodaj"/>
</form>

<h1>Lista Gości</h1>

<form method="post" action="">
Partner: 
<select name="partner">
  <option value="dow">Dowolnie</option>
  <option value="tak">Z partnerem</option>
  <option value="nie">Bez partnera</option>
</select>
Dzieci: 
<select name="dzieci">
  <option value="dow">Dowolnie</option>
  <option value="nie">Bez dzieci</option>
  <option value="tak">Z dziećmi</option>
  </select>
 Pokaż gości:
 <select name="odkogo">
  <option value="dow">Wszyscy</option>
  <option value="on"><?php $wesele->pokaz("mlody"); ?>	</option>
  <option value="ona"><?php $wesele->pokaz("mloda"); ?></option>
</select>
Sortuj:
<select name="sort">
  <option value="dow">Domyślnie</option>
  <option value="imie">Imionami</option>
  <option value="kogo">Od kogo</option>
</select>
</br>
</br>
<input type="submit" value="Filtruj"/>

</form>
</br>

<?php

$lista=new PokazGoscia($database);
$partner=$lista->filtrPartner($_POST['partner']);
$goscie=$lista->pokazListe($konto,$partner);







	







?>


</body>
</html>