<?php
//Klasa sluzaca do tworzenia obiektow klasy Wesele po zalogowaniu
	require_once "db_class.php";
	require_once "klasa_wesele.php";
	class Wesele_fabryka{
		private $base;
		
		public function __construct($base){
			$this->base=$base;
		}
		
		public function stworzWesele($login){
			$record=$this->base->zapytanie("SELECT * FROM wesela WHERE login='$login'","array");
			$wesele=new Wesele($record['mlody'],$record['mloda'],$record['data'],$record['login'],$record['haslo']);
			return $wesele;
		}
		
	}
	

?>


