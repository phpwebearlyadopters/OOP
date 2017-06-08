<?php
	class Database {
		private $host;
		private $user;
		private $password;
		private $db_name;
		private $pdo;
		
		//konstruktor polaczenia z baza;
		public function __construct($host,$user,$password,$db_name){
			$this->host=$host;
			$this->user=$user;
			$this->password=$password;
			$this->db_name=$db_name;
			
			try{
				$this->pdo = new PDO('mysql:host='.$host.';dbname='.$db_name, $user, $password );
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e) {
			echo '<span style="color:red">Błąd serwera! Prosimy spróbować później!</span>';
			echo "</br> Informacja developerska:".$e;
			}
		}
		public function zapytanie($sql,$type){
			try{
				$bazka=$this->pdo;
				$pytaj=$bazka->prepare($sql);
				$pytaj->execute();
				
				if($type=="array"){
				$wynik=$pytaj->fetch();
				return $wynik;
				}
				elseif($type=="rows"){
				$ile=$pytaj->rowCount();
				return $ile;
				}
				else{
					return $pytaj;
				}
				

			
			}
			catch (PDOException $e) {
			echo '<span style="color:red">Błąd serwera! Prosimy spróbować później!</span>';
			echo "</br> Informacja developerska:".$e;
			}
		}
	}
	
	
	

?>