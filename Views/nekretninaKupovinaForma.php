	<center>	
	<div class="card" style="width: 48rem;">
	  <img src="../Pictures/Objects/<?php echo $objekt['slika']; ?>" class="card-img-top" alt="...">
	  <div class="card-body">
		<h5 class="card-title" style="color: black;"><?php echo $objekt['naslov'] ?></h5>
		<p class="card-text" align="left" style="color: black;"><?php echo $objekt['opis'] ?></p>
		<p align="center" style="color: black;"><?php echo $objekt['cijena'] ?> KM</p>
		
			<?php
		$korisnik = new userController;
		$idK=$korisnik->getKorisnikByCookie($_SESSION['userCookie']??'');
		?>
	<form method="POST" enctype="multipart/form-data">
		<input type="hidden" class="form-control" name="naslov" value="<?php echo $objekt['naslov'] ?>">
		<input type="hidden" class="form-control" name="opis" value="<?php echo $objekt['opis'] ?>">
		<input type="hidden" class="form-control" name="cijena" value="<?php echo $objekt['cijena'] ?>">
	  	<input type="hidden" name="slikaN" value="<?php echo $objekt['slika'] ?>">
		<input type="hidden" name="dostupno" value="0">
		<input type="hidden" name="idNekretnina" value="<?php echo $objekt['idNekretnina']; ?>">
		<input type="hidden" name="idKorisnikaKupio" value="<?php echo $idK; ?>">
		<input type="hidden" name="idKorisnikaPostavio" value="<?php echo $objekt['idKorisnikaPostavio']; ?>">
	  <button type="submit" class="btn btn-primary">Kupi</button>
	</form>
	
	  </div>
	</div>	
	</center>