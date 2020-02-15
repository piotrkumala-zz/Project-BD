<?php


namespace test;


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

    public function getQuestions()
    {
        $this->sth=self::$db->prepare('SELECT id_pytania, tresc, odpowiedza, odpowiedzb, odpowiedzc, poprawnaodpowiedz FROM pytania');
        $this->sth->execute();
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveTest($data)
    {
        $maxPoints = count($data);
        $points = 0;
        $server = $this->getQuestions();
        for($i = 0; $i<$maxPoints; $i++){
          if($server[$i]['poprawnaodpowiedz'] == $data[$i+1])  {
              $points++;
          }
        }
        $result = $points/$maxPoints * 100;
        session_start();
        $this->sth= self::$db->prepare('INSERT INTO test (id_klienta, wynik) VALUES (:id_klienta, :wynik)');
        $this->sth->bindValue(':id_klienta', $_SESSION['Id']);
        $this->sth->bindValue(':wynik',$result );
        $this->sth->execute();
        return $result;
    }


}