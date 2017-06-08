<?php
session_start();
require_once "db_class.php";
	class Wesele{
		private $mlody;
		private $mloda;
		private $data;
		private $login;
		private $haslo;
		//konstruktor klasy
		public function __construct($one,$two,$three,$four,$five){
			$this->mlody=$one;
			$this->mloda=$two;
			$this->data=$three;
			$this->login=$four;
			$this->haslo=$five;
			
		}
		//funkcja sprawdzajaca poprawnosc danych wprowadzonych
		public function walidacja(){
			$mlody=$this->mlody;
			$mloda=$this->mloda;
			$data=$this->data;
			$login=$this->login;
			$haslo=$this->haslo;
			$mlody=htmlentities($mlody,ENT_QUOTES,"UTF-8");
			$mloda=htmlentities($mloda,ENT_QUOTES,"UTF-8");
			$login=htmlentities($login,ENT_QUOTES,"UTF-8");
			$haslo=htmlentities($haslo,ENT_QUOTES,"UTF-8");
			
			//Sprawdzenie czy nie zostało puste pole
			if(empty($data && $mlody && $mloda && $login && $haslo)){
				echo "Wszystkie pola muszą być wypełnione";
				header("Location:index.php");
				exit();
				
			}
			
			//Sprawdzenie czy imiona są zapisane bez cyfr i spacji
			if(preg_match("/[0-9]/",$mlody)||preg_match("/[0-9]/",$mloda)){
				echo "Imię nie może zawierać cyfr lub liczb";
				header("Location:index.php");
				exit();
			}
			elseif(preg_match("/ /",$mlody)||preg_match("/ /",$mloda)){
				echo "Imię nie może zawierać spacji!!";
				header("Location:index.php");
				exit();
			}
			//Dlugosc nicku
			if((strlen($login))<3 || (strlen($login)>20)){
				echo "Login musi posiadać od 3 do 20 znaków!!";
				header("Location:index.php");
				exit();
			}
			if((ctype_alnum($login))==false ){
				echo"Login nie może posiadać polskich znaków oraz symboli!!";
				header("Location:index.php");
				exit();
			}
			//Hasło
			if((strlen($haslo))<5 || (strlen($haslo)>24)){
				echo "Hasło musi posiadać od 6 do 24 znaków!!";
				header("Location:index.php");
				exit();
			}
		}
		//metoda dodajaca obiekt klasy do bazy danych
		public function dodaj(){
			$mlody=$this->mlody;
			$mloda=$this->mloda;
			$data=$this->data;
			$login=$this->login;
			$haslo=$this->haslo;
			$hash=password_hash($haslo,PASSWORD_DEFAULT);
			
			$database=new Database("localhost","root","","wesele");
			$wynik=$database->zapytanie("SELECT id FROM wesela WHERE login='$login'","rows");
			
				if($wynik>0){
					echo "Istnieje już nick w bazie danych";
				}
				else{
				$insert=$database->zapytanie("INSERT INTO wesela VALUES (NULL, '$mlody', '$mloda', '$data','$login','$hash')","");
				
					if($insert==true){
						$log=$database->zapytanie("SELECT login FROM wesela WHERE login='$login'","array");
						$_SESSION['konto']=$log['login'];
						header("Location:main.php");
					}
				}
		}		
		
		//statyczna metoda odpowiadajaca za logowanie i stworzenie konkretnego obiektu wybranego z DB
		public static function loguj(){
			$login=$_POST['utw_login'];
			$haslo=$_POST['utw_haslo'];
			$login=htmlentities($login,ENT_QUOTES,"UTF-8");
			$haslo=htmlentities($haslo,ENT_QUOTES,"UTF-8");
			
				$database=new Database("localhost","root","","wesele");
				$wynik=$database->zapytanie("SELECT login,haslo FROM wesela WHERE login='$login'","rows");
				$array=$database->zapytanie("SELECT login,haslo FROM wesela WHERE login='$login'","array");
					if($wynik>0){
						if(password_verify($haslo, $array['haslo'])){
							$_SESSION['konto']=$array['login'];
							header("Location:main.php");
						}
						else{
							echo "Błędne hasło";
						}
						
					}
					else{
						echo "Błędny login";
					}
				}
							
		
		
		public function pokaz($param){
			switch($param){
				case "mlody":
					$mlody=$this->mlody;
					echo $mlody;
					break;
				case "mloda":
					$mloda=$this->mloda;
					echo $mloda;
					break;
				case "data":
					$data=$this->data;
					echo $data;
					break;
			}
			
		}	
	}

?>


