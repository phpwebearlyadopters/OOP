<?php
	
	require_once "klasa_wesele.php";
	require_once "guest_class.php";
	if(isset($_POST['mlody'])){
		$konto=new Wesele($_POST['mlody'],$_POST['mloda'],$_POST['data'],$_POST['login'],$_POST['haslo']);
		$konto->walidacja();
		$konto->dodaj();
	}
	elseif(isset($_POST['utw_login'])){
		Wesele::loguj();
	}
	elseif(isset($_POST['name'])){
		$guest=new Guest($_POST['name'],$_POST['partner'],$_POST['children'],$_POST['num_child'],$_POST['from_who']);
		print_r ($guest);
	}
	else{
		header("Location:index.php");
	}
?>