<?php
require_once('../Database.php');
require_once('../Util/pomocneFunkcije.php');
class Korisnik
{
    public ?int $idKorisnik = null; //1
	public ?string $userCookie = null; //2
    public string $ime; //3
    public string $prezime; //4
	public string $username; //5
	public string $sifra; //6
	public ?bool $aktivan = true; //7
	public ?bool $admin = false; //8
    public ?string $slika = null; //9
	public ?string $datumRegistracije = null; //10

    public function load($data)
    {
		if($data['idKorisnik'] == '')
			$data['idKorisnik']=0;
		if($data['aktivan'] == '')
			$data['aktivan']=true;
        $this->idKorisnik = $data['idKorisnik'] ?? null;
        $this->userCookie = $data['userCookie'] ?? null;
        $this->ime = $data['ime'];
		$this->prezime = $data['prezime'];
		$this->username = $data['username'];
		$this->sifra = $data['sifra'];
		$this->aktivan = $data['aktivan'] ?? true;
		$this->admin = $data['admin'] ?? false;
		$this->datumRegistracije = $data['datumRegistracije'] ?? null;
		$this->slika = $data['slikaN'] ?? null;
		
		if($data['slika'] && $data['slika']['tmp_name']){
			$folder = generateRandomString(10);
			mkdir('../Pictures/Users/'.$folder, 0777, true);
			$putSlike = '../Pictures/Users/'.$folder.'/'.$data['slika']['name'];
			move_uploaded_file($data['slika']['tmp_name'], $putSlike);
			$imeSlike = $data['slika']['name'] ?? null;
			$this->slika = $folder.'/'.$imeSlike;
		}
    }

	public function generisiCookie()
    {
        $this->userCookie = generateRandomString();
    }

    public function save()
    {
            $baza = new Database;
            if ($this->idKorisnik) {
                $baza->updateUser($this);
            } else {
                $baza->createUser($this);
            }

    }
}