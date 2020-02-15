<?php


namespace rasy;


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

    public function getAllRaces()
    {
        $this->sth = self::$db->prepare('SELECT id_r, nazwa FROM rasy');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveRace($data)
    {
        $this->sth = self::$db->prepare('INSERT INTO rasy(nazwa) VALUES (:nazwa)');
        $this->sth->bindValue(':nazwa', $data['rasaNazwa']);
        $this->sth->execute();
    }

    public function getDetails($id_r)
    {   $this->sth = self::$db->prepare('SELECT * FROM rasy r WHERE id_r=:id_r') ;
        $this->sth->bindValue(':id_r', $id_r[0], PDO::PARAM_STR);
        $this->sth->execute() ;
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteRace($id_r)
    {
        $this->sth = self::$db->prepare('DELETE FROM rasy WHERE id_r=:id_r');
        $this->sth->bindValue(':id_r', $id_r[0]);
        $this->sth->execute();
    }

    public function updateRace($data, $id_r)
    {
        $this->sth = self::$db->prepare('UPDATE rasy SET nazwa = :nazwa WHERE id_r=:id_r');
        $this->sth->bindValue(':nazwa', $data['rasaNazwa']);
        $this->sth->bindValue(':id_r', $id_r[0]);
        $this->sth->execute();

    }


}