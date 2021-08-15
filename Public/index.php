<?php
require_once('../Controllers/userController.php');
require_once('../Controllers/objectController.php');
session_start();
$korisnik = new userController;
$objekt = new objectController;
include("../Views/zaglavlje.php");
?>


	<table class="table table-secondary table-hover">
		<?php
		
		if ( $_SERVER['REQUEST_METHOD'] == 'GET' || !isset($_SESSION['userCookie']) ) {
			$objekt->getNekretnine($_GET['pretraga']??'');
		} elseif ( !isset($_POST['izbor']) && isset($_POST['idKorisnikaPostavio'])) {
			$objekt->dodajNekretninu($_POST + $_FILES);
			header('Location: index.php');
		} elseif ( !isset($_POST['izbor']) && isset($_POST['username'])) {
			$korisnik->dodajKorisnika($_POST + $_FILES);
			header('Location: index.php');
		} elseif ( $_POST['izbor'] == 'mojprofil'){
			$korisnik->getKorisnik($korisnik->getKorisnikByCookie($_SESSION['userCookie']??''));
		} elseif ( $_POST['izbor'] == 'objavi'){
			$idF = $korisnik->getKorisnikByCookie($_SESSION['userCookie']??'');
			$objekt->formaZaDodavanje($idF??0);
		} elseif ( $_POST['izbor'] == 'objavljeni'){
			$objekt->getNekretnineOdKorisnika($_SESSION['userCookie']??'');
		} elseif ( $_POST['izbor'] == 'prodani'){
			$objekt->getProdaneNekretnine($_SESSION['userCookie']??'');
		} elseif ( $_POST['izbor'] == 'editNekretnine'){
			$objekt->formaZaEdit($_POST['idNekretnina']??'');
		} elseif ( $_POST['izbor'] == 'kupiNekretnine'){
			$objekt->formaZaKupovinu($_POST['idNekretnina']??'');
		} elseif ( $_POST['izbor'] == 'admin'){
			$korisnik->getKorisnici('');
		} elseif ( $_POST['izbor'] == 'odjava'){
			session_unset();
			header('Location: index.php');
		} 
		?>
	</table>

</body>
</html>