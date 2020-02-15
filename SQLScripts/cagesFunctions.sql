CREATE OR REPLACE FUNCTION addKlatka(int, int ) RETURNS void  AS
    $$
        INSERT INTO klatka (id_rk, id_p) VALUES ($1,$2);
        INSERT INTO czynnoscikonserwacyjne (ostatniesprzatanie, wizytauweterynarza, ostatniwybieg, id_kl)
        VALUES ('01-01-1980', '01-01-1980', '01-01-1980', currval('klatka_id_kl_seq_1_1'));
    $$
LANGUAGE 'sql';


CREATE OR REPLACE FUNCTION szczurywklatce(int) RETURNS SETOF szczury AS
    $$
        DECLARE
            r szczury%rowtype;
        BEGIN
            FOR r IN
                SELECT * FROM szczury  WHERE id_kl = $1
            LOOP
                RETURN NEXT r;
                END LOOP;
            RETURN;
        END;
    $$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION nazwarasy(int) RETURNS TEXT AS
    $$
    DECLARE
        r rasy%rowtype;
        out text;
    BEGIN
        FOR r IN SELECT * FROM rasy LOOP
            IF r.id_r = $1
                THEN out = r.nazwa;

            end if;
            end loop;

        RETURN out;

    END;
    $$
LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION sprawdz_czy_klatka_pusta(int) RETURNS bool AS $$
    DECLARE
        out bool;
        ile int;
        max int;
    BEGIN
        ile = COUNT(*) FROM szczury WHERE id_kl =$1;
        max = rk.maksymalnapojemnosc FROM rodzajeklatek rk, klatka kl WHERE kl.id_kl = $1 AND kl.id_rk =rk.id_rk;
        IF ile <max THEN
            out = true;
            ELSE
            out = false;
        end if;
        RETURN out;
    end;
    $$LANGUAGE 'plpgsql';


    CREATE OR REPLACE FUNCTION czy_moze_zamowic(int) RETURNS BOOL LANGUAGE 'plpgsql' AS $$
    DECLARE
        _r test%rowtype;
    BEGIN
        FOR _r IN SELECT * FROM test WHERE id_klienta = $1 LOOP
            IF(_r.wynik>=50) THEN
                RETURN TRUE;
            end if;
        end loop;
        RETURN false;
    end;
    $$;

    CREATE OR REPLACE FUNCTION czy_login_zajety(text) RETURNS BOOL AS $$
    BEGIN
        IF EXISTS(SELECT * FROM klienci WHERE email = $1) THEN
            return true;
        end if;
        IF EXISTS(SELECT * FROM pracownicy WHERE login = $1) THEN
            return true;
        end if;
        return false;
    end;
    $$LANGUAGE 'plpgsql';


CREATE TYPE mytype AS (Id int , Typek varchar, loginek varchar, haslo varchar);
CREATE OR REPLACE FUNCTION login(text, text) RETURNS SETOF mytype  AS $$
    DECLARE
        loginek ALIAS FOR $1;
        haslo ALIAS FOR $2;
        _r mytype;
    BEGIN
        IF EXISTS(SELECT * FROM pracownicy p WHERE p.login =loginek) = true THEN
            FOR _r IN
                SELECT p.id_p, 'Pracownik', p.login, p.haslo FROM pracownicy p WHERE p.login = loginek
            LOOP
                IF _r.haslo = haslo THEN
                    RETURN NEXT _r;
                end if;
            end loop;
        end if;

        IF EXISTS(SELECT * FROM klienci kl WHERE kl.email =loginek) = true THEN
            FOR _r IN
            SELECT kl.id_klienta, 'Klient', kl.email, kl.haslo FROM klienci kl WHERE kl.email = loginek
            LOOP
                IF _r.haslo = haslo THEN
                    RETURN NEXT _r ;
                end if;
            end loop;
        end if;
    end;
    $$LANGUAGE 'plpgsql';