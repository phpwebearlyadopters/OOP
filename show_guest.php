<?php
//klasa do pokazywania gosci
	
	class PokazGoscia extends Wesele_fabryka{
		private $base;
		
		public function __construct($base){
			$this->base=$base;
		}
		
		public function pokazListe($wesele,$partner){
			$list=$this->base->zapytanie("SELECT L.* FROM wesela AS W,ludzie as L,wesele_goscie AS WG WHERE WG.id_wesele=W.id AND WG.id_ludzie=L.id AND W.id='$wesele' AND L.partner='$partner'","");

			while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
	
				print_r ($row['imie']); echo " ";
				print_r ($row['partner']); echo " ";
				print_r ($row['dzieci']); echo " ";
				print_r ($row['iledzieci']); echo " ";
				print_r ($row['odkogo']); echo " ";
				echo "</br>";
			}
		
		}
		public function filtrPartner($partner){
			if($partner=="tak"){
				return "tak";
			}
			elseif($partner=="nie"){
				return "nie";
			}
			
			
		}
	}		
?>


