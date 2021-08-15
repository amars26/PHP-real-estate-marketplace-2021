	<table width="100%" border=1>
	<tr>
	<td width=100%>
	<form method="POST" enctype="multipart/form-data" style="padding:50px">
	  <div class="mb-3">
		<label class="form-label">Ime</label>
		<input type="text" class="form-control" name="ime" value="<?php echo $osoba['ime'] ?>">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Prezime</label>
		<input type="text" class="form-control" name="prezime" value="<?php echo $osoba['prezime'] ?>">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $osoba['username'] ?>" readonly>
	  </div>
	  <div class="mb-3">
		<label class="form-label">Password</label>
		<input type="password" class="form-control" name="sifra" value="<?php echo $osoba['sifra'] ?>">
	  </div>
	  <div class="mb-3">
		<img src="../Pictures/Users/<?php echo $osoba['slika']; ?>" style="width:200px; height:200px">
		<br>
		<label class="form-label">Slika</label>
		<input type="file" class="form-control" name="slika">
	  </div>
	  	<input type="hidden" name="slikaN" value="<?php echo $osoba['slika'] ?>">
		<input type="hidden" name="idKorisnik" value="<?php echo $osoba['idKorisnik']; ?>">
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</td>
	</tr>
	</table>