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
	}
	

?>


