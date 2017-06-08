<?php
	
	require_once "klasa_wesele.php";
	if(isset($_POST['mlody'])){
		$konto=new Wesele($_POST['mlody'],$_POST['mloda'],$_POST['data'],$_POST['login'],$_POST['haslo']);
		$konto->walidacja();
		$konto->dodaj();
	}
	elseif(isset($_POST['utw_login'])){
		Wesele::loguj();
	}
	else{
		header("Location:index.php");
	}
?>