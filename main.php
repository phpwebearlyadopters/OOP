<?php
	require_once "wesele_fabryka.php";
	
	$konto=$_SESSION['konto'];
	$database=new Database("localhost","root","","wesele");
	$wesele_fabryka=new Wesele_fabryka($database);
	$wesele=$wesele_fabryka->stworzWesele($konto);
	$wesele->pokaz("mlody");
	
	
?>