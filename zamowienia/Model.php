<?php


namespace zamowienia;


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

    public function getOrders()
    {
        $this->sth = self::$db->prepare('SELECT * FROM zamowienia');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function placeOrder($id_sz)
    {
        session_start();
        $this->sth =self::$db->prepare('SELECT * FROM czy_moze_zamowic(:id_klienta)');
        $this->sth->bindValue(':id_klienta', $_SESSION['Id']);
        $this->sth->execute();
        $czyMoze = $this->sth->fetchAll(PDO::FETCH_ASSOC);
        if($czyMoze[0]['czy_moze_zamowic']) {
            $this->sth = self::$db->prepare('INSERT INTO zamowienia (cena, id_klienta, id_sz) VALUES (:cena, :id_klienta, :id_sz)');
            $this->sth->bindValue(':cena', 123);
            $this->sth->bindValue(':id_klienta', $_SESSION['Id']);
            $this->sth->bindValue(':id_sz', $id_sz[0]);
            $this->sth->execute();
            return true;
        }
        else{
            return false;
        }
    }

    public function getUserOrders($Id)
    {
        $this->sth = self::$db->prepare('SELECT * FROM zamowienia WHERE id_klienta = :id');
        $this->sth->bindValue(':id',$Id);
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

}