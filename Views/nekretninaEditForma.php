	
	<form method="POST" enctype="multipart/form-data" style="padding:50px">
	  <div class="mb-3">
		<label class="form-label">Naslov</label>
		<input type="text" class="form-control" name="naslov" value="<?php echo $objekt['naslov'] ?>">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Opis artikla</label>
		<input type="text" class="form-control" name="opis" value="<?php echo $objekt['opis'] ?>">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Cijena</label>
		<input type="text" class="form-control" name="cijena" value="<?php echo $objekt['cijena'] ?>">
	  </div>
	  <div class="mb-3">
		<img src="../Pictures/Objects/<?php echo $objekt['slika']; ?>" style="width:200px; height:200px">
		<br>
		<label for="exampleInputEmail1" class="form-label">Slika</label>
		<input type="file" class="form-control" name="slika">
	  </div>
	  	<input type="hidden" name="slikaN" value="<?php echo $objekt['slika'] ?>">
		<input type="hidden" name="idNekretnina" value="<?php echo $objekt['idNekretnina']; ?>">
		<input type="hidden" name="idKorisnikaKupio" value="<?php echo $objekt['idKorisnikaKupio']; ?>">
		<input type="hidden" name="idKorisnikaPostavio" value="<?php echo $objekt['idKorisnikaPostavio']; ?>">
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>