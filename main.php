<?php
	session_start();
	require_once "klasa_wesele.php";
	
	$konto=$_SESSION['konto'];
	print_r($konto);
	echo "Wesele ".$konto->pokaz("mlody")." i ".$konto->pokaz("mloda")." .";
	echo "Data wesela: ".$konto->pokaz("data");
	
?>