<?php


namespace rodzajklatki;


use PDO;

class Model
{
    static $dsn = "pgsql:host=localhost;port=5432;dbname=u7kumala;user=u7kumala;password=7kumala";
    protected static $db;
    private $sth;
    function __construct()
    {
        self::$db = new PDO ( self::$dsn ) ;
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
    }

    public function getAllCageTypes()
    {
        $this->sth = self::$db->prepare('SELECT * FROM rodzajeklatek');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveRace($data)
    {
        $this->sth = self::$db->prepare(
            'INSERT INTO rodzajeklatek (nazwa, wysokosc, szerokosc, dlugosc, maksymalnapojemnosc)
                        VALUES (:nazwa, :wysokosc, :szerokosc,:dlugosc, :maksymalnapojemnosc)');
        $this->sth->bindValue(':nazwa', $data['rodzajNazwa']);
        $this->sth->bindValue(':wysokosc', $data['rodzajWysokosc']);
        $this->sth->bindValue(':szerokosc', $data['rodzajSzerokosc']);
        $this->sth->bindValue(':dlugosc', $data['rodzajDlugosc']);
        $this->sth->bindValue(':maksymalnapojemnosc', $data['rodzajPojemnosc']);
        $this->sth->execute();

    }

    public function deleteCageType($id_rk)
    {
        $this->sth = self::$db->prepare('DELETE FROM rodzajeklatek WHERE id_rk=:id_rk');
        $this->sth->bindValue(':id_rk', $id_rk[0]);
        $this->sth->execute();
    }


}