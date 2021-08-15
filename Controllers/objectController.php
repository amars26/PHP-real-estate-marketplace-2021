<?php
require_once('../Database.php');
require_once('../Models/Nekretnina.php');

class objectController{

	function getNekretnine($pretraga){
		$baza = new Database;
		$x = $baza->getObjects($pretraga);
		foreach($x as $objekt){
			include("../Views/nekretninaPregledForma.php");
		}
	}
	
	function getNekretnineOdKorisnika($cookie){
		$baza = new Database;
		$x = $baza->getObjectsOnSale($cookie);
		foreach($x as $objekt){
			include("../Views/nekretninaPregledForma.php");
		}
	}
	
	function getProdaneNekretnine($cookie){
		$baza = new Database;
		$x = $baza->getSoldObjects($cookie);
		foreach($x as $objekt){
			include("../Views/nekretninaPregledForma.php");
		}
	}

	function getNekretnina($id){
		$baza = new Database;
		$x = $baza->getObjectById($id);
		foreach($x as $object){
			include("../Views/nekretninaPregledForma.php");
		}
	}

	function dodajNekretninu($data){
		$nekretnina = new Nekretnina;
		$nekretnina->load($data);
		$nekretnina->save();
	}

	function formaZaDodavanje($idF){
		include("../Views/nekretninaDodavanjeForma.php");
	}
	
	function formaZaEdit($idNekretnina){
		$baza = new Database;
		$objekt = $baza->getObjectById($idNekretnina);
		include("../Views/nekretninaEditForma.php");
	}

	function formaZaKupovinu($idNekretnina){
		$baza = new Database;
		$objekt = $baza->getObjectById($idNekretnina);
		include("../Views/nekretninaKupovinaForma.php");
	}
}


?>