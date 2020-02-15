DROP SCHEMA public CASCADE;
CREATE SCHEMA public;


CREATE SEQUENCE public.pytania_id_pytania_seq;

CREATE TABLE public.Pytania (
                Id_pytania INTEGER NOT NULL DEFAULT nextval('public.pytania_id_pytania_seq'),
                Tresc VARCHAR NOT NULL,
                PoprawnaOdpowiedz INTEGER NOT NULL,
                OdpowiedzA VARCHAR NOT NULL,
                OdpowiedzB VARCHAR NOT NULL,
                OdpowiedzC VARCHAR NOT NULL,
                CONSTRAINT pytania_pk PRIMARY KEY (Id_pytania)
);


ALTER SEQUENCE public.pytania_id_pytania_seq OWNED BY public.Pytania.Id_pytania;

CREATE SEQUENCE public.klienci_id_klienta_seq_1;

CREATE TABLE public.Klienci (
                Id_klienta INTEGER NOT NULL DEFAULT nextval('public.klienci_id_klienta_seq_1'),
                Imie VARCHAR NOT NULL,
                Nazwisko VARCHAR NOT NULL,
                Email VARCHAR NOT NULL,
                Adres VARCHAR NOT NULL,
                Haslo VARCHAR NOT NULL,
                NumerTelefonu VARCHAR,
                CONSTRAINT klienci_pk PRIMARY KEY (Id_klienta)
);


ALTER SEQUENCE public.klienci_id_klienta_seq_1 OWNED BY public.Klienci.Id_klienta;

CREATE SEQUENCE public.test_id_t_seq;

CREATE TABLE public.Test (
                Id_t INTEGER NOT NULL DEFAULT nextval('public.test_id_t_seq'),
                Id_klienta INTEGER NOT NULL,
                Wynik NUMERIC NOT NULL,
                CONSTRAINT test_pk PRIMARY KEY (Id_t, Id_klienta)
);


ALTER SEQUENCE public.test_id_t_seq OWNED BY public.Test.Id_t;

CREATE SEQUENCE public.rodzajeklatek_id_rk_seq_1;

CREATE TABLE public.RodzajeKlatek (
                Id_rk INTEGER NOT NULL DEFAULT nextval('public.rodzajeklatek_id_rk_seq_1'),
                Nazwa VARCHAR NOT NULL,
                Wysokosc INTEGER NOT NULL,
                Szerokosc INTEGER NOT NULL,
                Dlugosc VARCHAR NOT NULL,
                MaksymalnaPojemnosc INTEGER NOT NULL,
                CONSTRAINT rodzajeklatek_pk PRIMARY KEY (Id_rk)
);


ALTER SEQUENCE public.rodzajeklatek_id_rk_seq_1 OWNED BY public.RodzajeKlatek.Id_rk;

CREATE SEQUENCE public.rasy_id_r_seq;

CREATE TABLE public.Rasy (
                Id_r INTEGER NOT NULL DEFAULT nextval('public.rasy_id_r_seq'),
                Nazwa VARCHAR NOT NULL,
                Cena NUMERIC NOT NULL,
                CONSTRAINT id_r PRIMARY KEY (Id_r)
);


ALTER SEQUENCE public.rasy_id_r_seq OWNED BY public.Rasy.Id_r;

CREATE SEQUENCE public.pracownicy_id_p_seq;

CREATE TABLE public.Pracownicy (
                Id_p INTEGER NOT NULL DEFAULT nextval('public.pracownicy_id_p_seq'),
                Imie VARCHAR,
                Nazwisko VARCHAR,
                NumerKonta VARCHAR,
                Login VARCHAR NOT NULL,
                Haslo VARCHAR NOT NULL,
                CONSTRAINT pracownicy_pk PRIMARY KEY (Id_p)
);


ALTER SEQUENCE public.pracownicy_id_p_seq OWNED BY public.Pracownicy.Id_p;

CREATE SEQUENCE public.klatka_id_kl_seq_1_1;

CREATE TABLE public.Klatka (
                Id_kl INTEGER NOT NULL DEFAULT nextval('public.klatka_id_kl_seq_1_1'),
                Id_rk INTEGER NOT NULL,
                Id_p INTEGER NOT NULL,
                CONSTRAINT klatka_pk PRIMARY KEY (Id_kl)
);


ALTER SEQUENCE public.klatka_id_kl_seq_1_1 OWNED BY public.Klatka.Id_kl;

CREATE SEQUENCE public.szczury_id_sz_seq;

CREATE TABLE public.Szczury (
                Id_sz INTEGER NOT NULL DEFAULT nextval('public.szczury_id_sz_seq'),
                Imie VARCHAR NOT NULL,
                DataUrodzenia DATE NOT NULL,
                Plec VARCHAR NOT NULL,
                Matka INTEGER,
                Ojciec INTEGER,
                Opis VARCHAR,
                StanZdrowia VARCHAR NOT NULL,
                Id_r INTEGER NOT NULL,
                Id_kl INTEGER NOT NULL,
                CONSTRAINT id_sz PRIMARY KEY (Id_sz)
);


ALTER SEQUENCE public.szczury_id_sz_seq OWNED BY public.Szczury.Id_sz;

CREATE SEQUENCE public.zamowienia_id_z_seq_1;

CREATE TABLE public.Zamowienia (
                Id_z INTEGER NOT NULL DEFAULT nextval('public.zamowienia_id_z_seq_1'),
                Cena DOUBLE PRECISION NOT NULL,
                Id_klienta INTEGER NOT NULL,
                Id_sz INTEGER NOT NULL,
                CONSTRAINT zamowienia_pk PRIMARY KEY (Id_z)
);


ALTER SEQUENCE public.zamowienia_id_z_seq_1 OWNED BY public.Zamowienia.Id_z;

CREATE SEQUENCE public.czynnoscikonserwacyjne_id_ck_seq;

CREATE TABLE public.CzynnosciKonserwacyjne (
                Id_ck INTEGER NOT NULL DEFAULT nextval('public.czynnoscikonserwacyjne_id_ck_seq'),
                OstatnieSprzatanie DATE NOT NULL,
                WizytaUWeterynarza DATE NOT NULL,
                OstatniWybieg VARCHAR NOT NULL,
                Id_kl INTEGER NOT NULL,
                CONSTRAINT czynnoscikonserwacyjne_pk PRIMARY KEY (Id_ck)
);


ALTER SEQUENCE public.czynnoscikonserwacyjne_id_ck_seq OWNED BY public.CzynnosciKonserwacyjne.Id_ck;

ALTER TABLE public.Zamowienia ADD CONSTRAINT klienci_zamowienia_fk
FOREIGN KEY (Id_klienta)
REFERENCES public.Klienci (Id_klienta)
ON DELETE RESTRICT
ON UPDATE RESTRICT
NOT DEFERRABLE;

ALTER TABLE public.Test ADD CONSTRAINT klienci_test_fk
FOREIGN KEY (Id_klienta)
REFERENCES public.Klienci (Id_klienta)
ON DELETE RESTRICT
ON UPDATE RESTRICT
NOT DEFERRABLE;

ALTER TABLE public.Klatka ADD CONSTRAINT rodzajeklatek_klatka_fk
FOREIGN KEY (Id_rk)
REFERENCES public.RodzajeKlatek (Id_rk)
ON DELETE RESTRICT
ON UPDATE RESTRICT
NOT DEFERRABLE;

ALTER TABLE public.Szczury ADD CONSTRAINT rasy_szczury_fk
FOREIGN KEY (Id_r)
REFERENCES public.Rasy (Id_r)
ON DELETE RESTRICT
ON UPDATE RESTRICT
NOT DEFERRABLE;

ALTER TABLE public.Klatka ADD CONSTRAINT pracownicy_klatka_fk
FOREIGN KEY (Id_p)
REFERENCES public.Pracownicy (Id_p)
ON DELETE RESTRICT
ON UPDATE RESTRICT
NOT DEFERRABLE;

ALTER TABLE public.CzynnosciKonserwacyjne ADD CONSTRAINT klatka_czynnoscikonserwacyjne_fk
FOREIGN KEY (Id_kl)
REFERENCES public.Klatka (Id_kl)
ON DELETE RESTRICT
ON UPDATE RESTRICT
NOT DEFERRABLE;

ALTER TABLE public.Szczury ADD CONSTRAINT klatka_szczury_fk
FOREIGN KEY (Id_kl)
REFERENCES public.Klatka (Id_kl)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Zamowienia ADD CONSTRAINT szczury_zamowienia_fk
FOREIGN KEY (Id_sz)
REFERENCES public.Szczury (Id_sz)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;