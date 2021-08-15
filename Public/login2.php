<?php
require_once('../Controllers/userController.php');
session_start();
if(isset($_SESSION['userCookie']))
	header('Location: index.php');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$korisnik = new userController;
	if($korisnik->provjeriPrijavu($_POST['username'],$_POST['sifra']))
		header('Location: index.php');
}
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	<form style="padding:50px" method="POST">
	  <div class="mb-3">
		<label class="form-label">Username</label>
		<input type="text" class="form-control" name="username">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Password</label>
		<input type="password" class="form-control" name="sifra">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a href="register.php">Registrirajte se</a>
</body>
</html>