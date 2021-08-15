<tr>
	<td width=20%>
		<img src="<?php echo '../Pictures/Objects/'.$objekt['slika']; ?>" height=150px width=200px>
	</td>
	<td width=60%>
		<b><?php echo $objekt['naslov']; ?></b>
		<br>
		<i><?php echo $objekt['opis']; ?></i>
	</td>
	<td width=20%>
		<?php echo $objekt['cijena'] . ' KM<br>'; ?>
		<?php
		$korisnik = new userController;
		$idK=$korisnik->getKorisnikByCookie($_SESSION['userCookie']??'');
		if(isset($_SESSION['userCookie'])){
		if($objekt['dostupno']==1 && $objekt['idKorisnikaKupio']==$objekt['idKorisnikaPostavio'] && $idK == $objekt['idKorisnikaPostavio'])
			include("editButton.php");
		if($objekt['dostupno']==1 && $objekt['idKorisnikaKupio']==$objekt['idKorisnikaPostavio'] && $idK != $objekt['idKorisnikaPostavio'])
			include("kupiButton.php");
		}
		?>
	</td>
</tr>