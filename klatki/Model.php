<?php


namespace klatki;


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

    public function getAllCages()
    {
        $this->sth = self::$db->prepare('SELECT kl.id_kl as numerklatki, rkl.nazwa as rodzajklatki, rkl.maksymalnapojemnosc, p.imie as pracownik,
            cz.ostatniesprzatanie,cz.ostatniwybieg, cz.wizytauweterynarza FROM klatka kl, rodzajeklatek rkl, pracownicy p, czynnoscikonserwacyjne cz 
            WHERE p.id_p = kl.id_p AND rkl.id_rk = kl.id_rk AND cz.id_kl = kl.id_kl');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRatsInCage($id_kl)
    {
        $this->sth = self::$db->prepare('SELECT sz.imie,sz.plec, nazwarasy(sz.id_r), sz.stanzdrowia FROM szcurywklatce(:id_kl) sz');
        $this->sth->bindValue(':id_kl', $id_kl[0]);
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCage($id_kl)
    {
        $this->sth = self::$db->prepare('DELETE FROM klatka WHERE id_kl=:id_kl');
        $this->sth->bindValue(':id_kl', $id_kl[0]);
        $this->sth->execute();
    }

    public function getCagesTypes()
    {
        $this->sth = self::$db->prepare('SELECT rk.id_rk, rk.nazwa FROM rodzajeklatek rk');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWorkers()
    {
        $this->sth= self::$db->prepare('SELECT p.id_p, p.imie FROM pracownicy p');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveCage($data)
    {
        $this->sth=self::$db->prepare('SELECT addKlatka(:id_rk, :id_p)');
        $this->sth->bindValue(':id_rk', $data['rodzajKlatka']);
        $this->sth->bindValue(':id_p', $data['pracownikKlatka']);
        $this->sth->execute();
    }
}