<?php
require_once('../Database.php');
require_once('../Util/pomocneFunkcije.php');
class Nekretnina
{
    public ?int $idNekretnina = null; //1
	public string $opis; //2
    public string $naslov; //3
    public int $cijena; //4
	public int $idKorisnikaKupio; //5
	public int $idKorisnikaPostavio; //6
	public ?bool $dostupno = true; //7
    public ?string $slika = null; //8
	public ?string $datumObjave = null; //9

    public function load($data)
    {
		if(!isset($data['idNekretnina']))
			$data['idNekretnina']=0;
		if(!isset($data['dostupno']))
			$data['dostupno']=true;
        $this->idNekretnina = $data['idNekretnina'] ?? null;
        $this->opis = $data['opis'];
		$this->naslov = $data['naslov'];
		$this->cijena = $data['cijena'];
		$this->idKorisnikaPostavio = $data['idKorisnikaPostavio'];
		$this->dostupno = $data['dostupno'] ?? true;
		$this->idKorisnikaKupio = $data['idKorisnikaKupio'] ?? null;
		$this->datumObjave = $data['datumObjave'] ?? null;
		$this->slika = $data['slikaN'] ?? null;
		
		if($data['slika'] && $data['slika']['tmp_name']){
			$folder = generateRandomString(10);
			mkdir('../Pictures/Objects/'.$folder, 0777, true);
			$putSlike = '../Pictures/Objects/'.$folder.'/'.$data['slika']['name'];
			move_uploaded_file($data['slika']['tmp_name'], $putSlike);
			$imeSlike = $data['slika']['name'] ?? null;
			$this->slika = $folder.'/'.$imeSlike;
		}
    }

    public function save()
    {
            $baza = new Database;
            if ($this->idNekretnina) {
                $baza->updateObject($this);
            } else {
                $baza->createObject($this);
            }

    }
}