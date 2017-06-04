<?php
session_start();
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
			
			require_once "connect.php";
			try{
				$pdo=$pdo = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password );
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//sprawdzenie czy nie istnieje juz login
				$check=$pdo->prepare("SELECT id FROM wesela WHERE login='$login'");
				$check->execute();
				$wynik=$check->rowCount(); //zwraca ilosc wierszy 
				if($wynik>0){
					echo "Istnieje już nick w bazie danych";
				}
				else{
				$new=$pdo->prepare("INSERT INTO wesela VALUES (NULL, '$mlody', '$mloda', '$data','$login','$hash')");
				$sprawdz=$new->execute();
				if($sprawdz==true){
					$log=$pdo->prepare('SELECT * FROM wesela WHERE login=:login ');
					$log->bindParam(':login', $login, PDO::PARAM_STR,20);
					$log->execute();
					$wynik=$log->rowCount();
					if($wynik>0){
						$dane=$log->fetch();
						$_SESSION['konto']=new Wesele($dane['1'],$dane['2'],$dane['3'],$dane['4'],$dane['5']);
						header("Location:main.php");
					}
					
				else{
					throw new PDOException($new->error);
				}
				}
				else{
					throw new PDOException($new->error);
				}
			
			}
			}
		catch (PDOException $e) {
			echo '<span style="color:red">Błąd serwera! Prosimy spróbować później!</span>';
			echo "</br> Informacja developerska:".$e;
			}
		}
		//statyczna metoda odpowiadajaca za logowanie i stworzenie konkretnego obiektu wybranego z DB
		public static function loguj(){
			$login=$_POST['utw_login'];
			$haslo=$_POST['utw_haslo'];
			$login=htmlentities($login,ENT_QUOTES,"UTF-8");
			$haslo=htmlentities($haslo,ENT_QUOTES,"UTF-8");
			require_once "connect.php";
				try{
				$pdo = new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password );
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$log=$pdo->prepare('SELECT * FROM wesela WHERE login=:login ');
				$log->bindParam(':login', $login, PDO::PARAM_STR,20);
				$log->execute();
				$wynik=$log->rowCount();
					if($wynik>0){
						$dane=$log->fetch();
						if(password_verify($haslo, $dane['haslo'])){
							$_SESSION['konto']=new Wesele($dane['1'],$dane['2'],$dane['3'],$dane['4'],$dane['5']);
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
				catch (PDOException $e) {
					echo '<span style="color:red">Błąd serwera! Prosimy spróbować później!</span>';
					echo "</br> Informacja developerska:".$e;
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


