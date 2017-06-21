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
<?php
print_r ($wesele);
echo "</br>";
$list=$database->zapytanie("SELECT L.* FROM wesela AS W,ludzie as L,wesele_goscie AS WG WHERE WG.id_wesele=W.id AND WG.id_ludzie=L.id AND W.id='$konto'","")->fetchAll(PDO::FETCH_ASSOC);
$ile=$database->zapytanie("SELECT L.* FROM wesela AS W,ludzie as L,wesele_goscie AS WG WHERE WG.id_wesele=W.id AND WG.id_ludzie=L.id AND W.id='$konto'","rows");

for($i=0 ; $i < $ile ; $i++){
	foreach ($list[$i] as $gosc){
	print_r ($gosc);
	echo " ";
	
}
echo "</br>";
}



?>


</body>
</html>