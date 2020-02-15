<?php


namespace szczury {
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

        public function getAllRats()
        {
            $this->sth = self::$db->prepare('SELECT sz.id_sz, sz.imie, r.nazwa FROM szczury sz, rasy r WHERE sz.id_r=r.id_r') ;
            $this->sth->execute() ;
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDetails($id_sz)
        {
            $this->sth = self::$db->prepare('SELECT sz.imie, sz.dataurodzenia, sz.plec, sz.matka,sz.ojciec, sz.opis, sz.stanzdrowia, sz.id_kl as numerklatki, sz.id_r as numerrasy, r.nazwa as rasa FROM szczury sz, rasy r WHERE sz.id_r=r.id_r AND sz.id_sz =:id_sz') ;
            $this->sth->bindValue(':id_sz', $id_sz[0], PDO::PARAM_STR);
            $this->sth->execute() ;
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteRat($id_sz)
        {
            $this->sth = self::$db->prepare('DELETE FROM szczury WHERE id_sz =:id_sz') ;
            $this->sth->bindValue(':id_sz', $id_sz[0], PDO::PARAM_STR);
            $this->sth->execute() ;
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllRaces()
        {
            $this->sth = self::$db->prepare('SELECT id_r, nazwa FROM rasy');
            $this->sth->execute();
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllMothers()
        {
            $this->sth = self::$db->prepare("SELECT id_sz, imie FROM szczury WHERE plec = 'samica'");
            $this->sth->execute();
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllFathers()
        {
            $this->sth = self::$db->prepare("SELECT id_sz, imie FROM szczury WHERE plec = 'samiec'");
            $this->sth->execute();
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function saveRat($data)
        {
            $this->sth= self::$db->prepare('SELECT * FROM sprawdz_czy_klatka_pusta(:id_kl)');
            $this->sth->bindValue(':id_kl', $data['szczurNumerKlatki']);
            $this->sth->execute();
            $isEmpty = $this->sth->fetchAll(PDO::FETCH_ASSOC);
            if($isEmpty[0]["sprawdz_czy_klatka_pusta"] == true) {
                $this->sth = self::$db->prepare("INSERT INTO szczury(imie, dataurodzenia, plec, matka, ojciec, opis, stanzdrowia, id_r, id_kl) 
                VALUES (:imie, :daturodzenia, :plec, :matka, :ojciec, :opis, :stanzdrowia, :id_r, :id_kl)");
                $this->sth->bindValue(':imie', $data['szczurImie']);
                $this->sth->bindValue(':daturodzenia', $data['szczurDataUrodzenia']);
                $this->sth->bindValue(':plec', $data['szczurPlec']);
                $this->sth->bindValue(':matka', $data['szczurMatka']);
                $this->sth->bindValue(':ojciec', $data['szczurOjciec']);
                $this->sth->bindValue(':opis', $data['szczurOpis']);
                $this->sth->bindValue(':stanzdrowia', $data['szczurStanZdrowia']);
                $this->sth->bindValue(':id_r', $data['szczurRasa']);
                $this->sth->bindValue(':id_kl', $data['szczurNumerKlatki']);
                $this->sth->execute();
            }
            else{
                echo('Klatka jest pełna!');
            }
        }

        public function updateRat($data, $id_sz)
        {
            $this->sth = self::$db->prepare("UPDATE szczury
            SET imie =:imie, dataurodzenia = :daturodzenia,plec= :plec,matka= :matka,ojciec=:ojciec,opis= :opis,stanzdrowia= :stanzdrowia,id_r= :id_r,id_kl= :id_kl
            WHERE id_sz = :id_sz");
            $this->sth->bindValue(':imie', $data['szczurImie']);
            $this->sth->bindValue(':daturodzenia', $data['szczurDataUrodzenia']);
            $this->sth->bindValue(':plec', $data['szczurPlec']);
            $this->sth->bindValue(':matka', $data['szczurMatka']);
            $this->sth->bindValue(':ojciec', $data['szczurOjciec']);
            $this->sth->bindValue(':opis', $data['szczurOpis']);
            $this->sth->bindValue(':stanzdrowia', $data['szczurStanZdrowia']);
            $this->sth->bindValue(':id_r', $data['szczurRasa']);
            $this->sth->bindValue(':id_kl', $data['szczurNumerKlatki']);
            $this->sth->bindValue(':id_sz', $id_sz[0]);
            $this->sth->execute();
        }
    }
}