<?php


namespace uzytkownik;


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

    public function saveUser($data)
    {
        $this->sth = self::$db->prepare('SELECT * FROM czy_login_zajety(:email)');
        $this->sth->bindValue(':email', $data['uzytkownikEmail']);
        $this->sth->execute();
        $czyZajete = $this->sth->fetchAll(PDO::FETCH_ASSOC);
        if(!$czyZajete[0]['czy_login_zajety']){
            $this->sth = self::$db->prepare('INSERT INTO klienci (imie, nazwisko, email, adres, haslo, numertelefonu) VALUES (:imie, :nazwisko, :email, :adres, :haslo, :numertelefonu)');
            $this->sth->bindValue(':imie', $data['uzytkownikImie']);
            $this->sth->bindValue(':nazwisko', $data['uzytkownikNazwisko']);
            $this->sth->bindValue(':email', $data['uzytkownikEmail']);
            $this->sth->bindValue(':adres', $data['uzytkownikAdres']);
            $this->sth->bindValue(':haslo', $data['uzytkownikHaslo']);
            $this->sth->bindValue(':numertelefonu', $data['uzytkownikTelefon']);
            $this->sth->execute();
            return true;
        }
    }

    public function login($data)
    {
        session_start();
        $this->sth = self::$db->prepare('SELECT * FROM login(:loginek, :haslo)');
        $this->sth->bindValue(':loginek', $data['login']);
        $this->sth->bindValue(':haslo', $data['haslo']);
        $this->sth->execute();
        $result = $this->sth->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            $_SESSION['Id'] = $result[0]['id'];
            $_SESSION['Type'] = $result[0]['typek'];
            return true;
        }
        else{
            return false;
        }

        return 0;
    }
}