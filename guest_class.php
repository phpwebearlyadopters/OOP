<?php
//Klasa sluzaca do tworzenia gosci
	class Guest{
		private $name;
		private $partner;
		private $children;
		private $child_num;
		private $from_who;
		
		public function __construct($name,$partner,$children,$child_num,$from_who){
			$this->name=$name;
			$this->partner=$partner;
			$this->children=$children;
			$this->child_num=$child_num;
			$this->from_who=$from_who;
		}
		
		public function walidacja(){
			
			$name=$this->name;
			$partner=$this->partner;
			$children=$this->children;
			$child_num=$this->child_num;
			$from_who=$this->from_who;
			
			$name=htmlentities($name,ENT_QUOTES,"UTF-8");
			
			if(empty($name && $partner && $children && $from_who)){
				echo "Wszystkie pola muszą być wypełnione";
				//header("Location:main.php");
				exit();
			}
				
			if(preg_match("/[0-9]/",$name)){
				echo "Imię nie może zawierać cyfr lub liczb";
				//header("Location:main.php");
				exit();
			}
			if($children=="yes" && $child_num==0){
				echo "Podaj liczbę dzieci";
				//header("Location:main.php");
				exit();
			}
			elseif($children=="no" && $child_num>0){
				echo "Osoba przychodzi bez dzieci!";
				exit();
			}
			if(!(is_numeric($child_num))){
				echo "Podaj liczbę nie tekst";
				exit();
			}
		}
		
		public function dodaj(){
			
			$name=$this->name;
			$partner=$this->partner;
			$children=$this->children;
			$child_num=$this->child_num;
			$from_who=$this->from_who;
			$database=new Database("localhost","root","","wesele");
			$insert=$database->zapytanie("INSERT INTO ludzie VALUES (NULL, '$name', '$partner', '$children','$child_num','$from_who')","");
				if($insert==true){
					$log=$database->zapytanie("SELECT id FROM ludzie WHERE imie='$name' AND partner='$partner' AND dzieci='$children' AND iledzieci='$child_num' AND odkogo='$from_who' ","array");
					$_SESSION['guest']=$log['id'];
				
				}

			
		}
	}
	

?>


