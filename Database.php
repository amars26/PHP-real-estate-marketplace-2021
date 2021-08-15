<?php

class Database
{
    public $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=ehouse', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }
	
	public function getUserById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM korisnik WHERE idKorisnik = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
	
	public function getUsers($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM korisnik WHERE ime like :keyword');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM korisnik');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getUserWith($username, $password)
    {
        $statement = $this->pdo->prepare('SELECT * FROM korisnik WHERE username = :username AND sifra = :password AND aktivan = 1');
        $statement->bindValue(":username", $username);
		$statement->bindValue(":password", $password);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getUserByCookie($userCookie)
    {
        $statement = $this->pdo->prepare('SELECT * FROM korisnik WHERE userCookie = :userCookie');
        $statement->bindValue(":userCookie", $userCookie);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function updateUser(Korisnik $korisnik)
    {
        $statement = $this->pdo->prepare("UPDATE korisnik SET 
										ime = :ime, 
                                        prezime = :prezime, 
                                        username = :username, 
                                        sifra = :sifra, 
										admin = :admin, 
										aktivan = :aktivan, 
										slika = :slika 
										WHERE idKorisnik = :id");
        $statement->bindValue(':ime', $korisnik->ime);
        $statement->bindValue(':prezime', $korisnik->prezime);
        $statement->bindValue(':username', $korisnik->username);
		$statement->bindValue(':sifra', $korisnik->sifra);
		$statement->bindValue(':admin', $korisnik->admin);
		$statement->bindValue(':aktivan', $korisnik->aktivan);
		$statement->bindValue(':slika', $korisnik->slika);
        $statement->bindValue(':id', $korisnik->idKorisnik);

        $statement->execute();
    }
	
	public function createUser(Korisnik $korisnik)
    {
		$korisnik->generisiCookie();
        $statement = $this->pdo->prepare("INSERT INTO korisnik (ime, prezime, username, sifra, userCookie, slika)
                VALUES (:ime, :prezime, :username, :sifra, :userCookie, :slika)");
        $statement->bindValue(':ime', $korisnik->ime);
        $statement->bindValue(':prezime', $korisnik->prezime);
        $statement->bindValue(':username', $korisnik->username);
		$statement->bindValue(':sifra', $korisnik->sifra);
		$statement->bindValue(':slika', $korisnik->slika);
        $statement->bindValue(':userCookie', $korisnik->userCookie);
		
        $statement->execute();
    } //users
	
		public function getObjectById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM nekretnina WHERE idNekretnina = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
	
	public function getObjects($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM nekretnina WHERE naslov like :keyword AND dostupno=1');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM nekretnina WHERE dostupno=1');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getObjectsOnSale($userCookie = '')
    {
        $statement = $this->pdo->prepare('SELECT nekretnina.* FROM nekretnina, korisnik WHERE nekretnina.idKorisnikaPostavio = korisnik.idKorisnik AND nekretnina.idKorisnikaPostavio = nekretnina.idKorisnikaKupio AND korisnik.userCookie = :userCookie');
        $statement->bindValue(":userCookie", $userCookie);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getSoldObjects($userCookie = '')
    {
        $statement = $this->pdo->prepare('SELECT nekretnina.* FROM nekretnina, korisnik WHERE nekretnina.idKorisnikaPostavio = korisnik.idKorisnik AND nekretnina.idKorisnikaPostavio != nekretnina.idKorisnikaKupio AND korisnik.userCookie = :userCookie');
        $statement->bindValue(":userCookie", $userCookie);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function updateObject(Nekretnina $nekretnina)
    {
        $statement = $this->pdo->prepare("UPDATE nekretnina SET 
										naslov = :naslov, 
                                        cijena = :cijena, 
                                        idKorisnikaKupio = :idKorisnikaKupio, 
                                        idKorisnikaPostavio = :idKorisnikaPostavio, 
										opis = :opis, 
										dostupno = :dostupno, 
										slika = :slika 
										WHERE idNekretnina = :id");
        $statement->bindValue(':naslov', $nekretnina->naslov);
        $statement->bindValue(':cijena', $nekretnina->cijena);
        $statement->bindValue(':idKorisnikaKupio', $nekretnina->idKorisnikaKupio);
		$statement->bindValue(':idKorisnikaPostavio', $nekretnina->idKorisnikaPostavio);
		$statement->bindValue(':opis', $nekretnina->opis);
		$statement->bindValue(':dostupno', $nekretnina->dostupno);
		$statement->bindValue(':slika', $nekretnina->slika);
        $statement->bindValue(':id', $nekretnina->idNekretnina);

        $statement->execute();
    }
	
	public function createObject(Nekretnina $nekretnina)
    {
        $statement = $this->pdo->prepare("INSERT INTO nekretnina (naslov, slika, cijena, idKorisnikaPostavio, opis, idKorisnikaKupio)
                VALUES (:naslov, :slika, :cijena, :idKorisnikaPostavio, :opis, :idKorisnikaKupio)");
        $statement->bindValue(':naslov', $nekretnina->naslov);
        $statement->bindValue(':slika', $nekretnina->slika);
        $statement->bindValue(':cijena', $nekretnina->cijena);
		$statement->bindValue(':idKorisnikaPostavio', $nekretnina->idKorisnikaPostavio);
		$statement->bindValue(':opis', $nekretnina->opis);
		$statement->bindValue(':idKorisnikaKupio', $nekretnina->idKorisnikaKupio);
		
		var_dump($statement);
        $statement->execute();
    } 

}