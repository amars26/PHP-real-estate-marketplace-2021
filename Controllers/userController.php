<?php
require_once('../Database.php');
require_once('../Models/Korisnik.php');

class userController{

	function getKorisnici($pretraga){
		$baza = new Database;
		$x = $baza->getUsers($pretraga);
		foreach($x as $osoba){
			include("../Views/korisnikAdminForma.php");
		}
	}

	function getKorisnik($id){
		$baza = new Database;
		$osoba = $baza->getUserById($id);
		include("../Views/mojProfilView.php");
	}

	function dodajKorisnika($data){
		$korisnik = new Korisnik;
		$korisnik->load($data);
		$korisnik->save();
	}
	
	function provjeriPrijavu($username, $sifra){
		$baza = new Database;
		$x = $baza->getUserWith($username, $sifra);
		foreach($x as $osoba){
			$_SESSION['userCookie']=$osoba['userCookie'];
			return true;
		}
		return false;
	}

	function getKorisnikByCookie($cookie){
		$baza = new Database;
		$idF = 0;
		$x = $baza->getUserByCookie($cookie);
		foreach($x as $osoba){
			$idF = $osoba['idKorisnik'];
		}
		return $idF;
	}
	
	function isAdmin($cookie){
		$baza = new Database;
		$jeAdmin = false;
		$x = $baza->getUserByCookie($cookie);
		foreach($x as $osoba){
			$jeAdmin = $osoba['admin'];
		}
		return $jeAdmin;
	}

}



?>