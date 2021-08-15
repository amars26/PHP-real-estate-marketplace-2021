	
	<form method="POST" enctype="multipart/form-data" style="padding:50px">
	  <div class="mb-3">
		<label class="form-label">Naslov</label>
		<input type="text" class="form-control" name="naslov">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Opis artikla</label>
		<input type="text" class="form-control" name="opis">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Cijena</label>
		<input type="text" class="form-control" name="cijena">
	  </div>
	  <div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Dodaj sliku</label>
		<input type="file" class="form-control" name="slika">
	  </div>
		<input type="hidden" name="idKorisnikaKupio" value="<?php echo $idF; ?>">
		<input type="hidden" name="idKorisnikaPostavio" value="<?php echo $idF; ?>">
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>