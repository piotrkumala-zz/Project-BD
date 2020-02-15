-- Populate Rasy
INSERT INTO Rasy (Nazwa, Cena) VALUES ('Kanałowiec', 50);
INSERT INTO Rasy (Nazwa, Cena) VALUES ('Albinos', 40);
INSERT INTO Rasy (Nazwa, Cena) VALUES ('Dumbo',80);

-- Populate Pracownicy
INSERT INTO Pracownicy (Imie, Nazwisko, login, Haslo)
    VALUES('Piotr', 'Kumala', 'piotr.kumala', 'Haslo');
INSERT INTO Pracownicy (Imie, Nazwisko, login, Haslo)
    VALUES('Elżbieta', 'Jaszczyk', 'elzbieta.jaszczyk', 'Haslo');


-- Populate RodzajeKlatek
INSERT INTO RodzajeKlatek (Nazwa, Wysokosc, Szerokosc, Dlugosc, MaksymalnaPojemnosc)
    VALUES ('Maxi', 140, 40, 60, 6);
INSERT INTO RodzajeKlatek (Nazwa, Wysokosc, Szerokosc, Dlugosc, MaksymalnaPojemnosc)
    VALUES ('Chorobowka', 40, 20, 20, 1);

-- Populate Klatka
INSERT INTO Klatka(Id_rk, Id_p) VALUES(1,1);
INSERT INTO Klatka(Id_rk, Id_p) VALUES(2,2);

-- Populate CzynnosciKonserwacyjne
INSERT INTO CzynnosciKonserwacyjne(OstatnieSprzatanie, WizytaUWeterynarza, OstatniWybieg, id_kl)
    VALUES ('01-03-2020', '01-01-1980', '01-10-2020', 1);
INSERT INTO CzynnosciKonserwacyjne(OstatnieSprzatanie, WizytaUWeterynarza, OstatniWybieg, id_kl)
    VALUES ('01-09-2020', '01-04-2020', '01-10-2020', 2);

-- Populate Szczury
INSERT INTO Szczury (Imie, DataUrodzenia, Plec, Opis, StanZdrowia, id_r, id_kl)
    VALUES ('Ciamka', '08-01-2018', 'samica','kochana','po sterylizacji', 1, 2);
INSERT INTO Szczury (Imie, DataUrodzenia, Plec, Opis, StanZdrowia, id_r, id_kl)
    VALUES ('Kluska', '02-16-2019', 'samica', 'tłuściutka', 'zdrowiutka', 2, 1);
INSERT INTO Szczury (Imie, DataUrodzenia, Plec, Opis, StanZdrowia, id_r, id_kl)
    VALUES ('Plotka', '02-16-2019', 'samica', 'bialutka', 'zdrowiutka', 2, 1);
INSERT INTO Szczury (Imie, DataUrodzenia, Plec, Opis, StanZdrowia, id_r, id_kl)
    VALUES ('Rurka', '08-02-2019', 'samica', 'ruda', 'zdrowiutka', 3, 1);
INSERT INTO Szczury (Imie, DataUrodzenia, Plec, Opis, StanZdrowia, id_r, id_kl)
    VALUES ('Gituwa', '08-02-2019', 'samica', 'szalona', 'zdrowiutka', 3, 1);


-- Populate Pytania
INSERT INTO pytania (tresc, poprawnaodpowiedz, odpowiedza, odpowiedzb, odpowiedzc) VALUES 
('Czy szczury mogą być wyprowadzane na spacer?', 2, 'Tak', 'Nie', 'Można, ale w specjanej smyczy');

INSERT INTO pytania (tresc, poprawnaodpowiedz, odpowiedza, odpowiedzb, odpowiedzc) VALUES 
('Jak powinno przebieigać łączenie szczurków?', 3, 'Neutralny teren => Kiszonka', 'Neutralny teren => Wspólna klatka', 'Neutralny teren => Kiszonka=> Wpólna klatka');

INSERT INTO pytania (tresc, poprawnaodpowiedz, odpowiedza, odpowiedzb, odpowiedzc) VALUES 
('Czy szczurki powinno się kastrować?', 1, 'Tak', 'Nie', 'Tylko samców');

INSERT INTO pytania (tresc, poprawnaodpowiedz, odpowiedza, odpowiedzb, odpowiedzc) VALUES 
('W jakim wieku oddzielamy samiczki od samców?', 3, '1 rok', '2 miesiące', '4 tygodnie');

INSERT INTO pytania (tresc, poprawnaodpowiedz, odpowiedza, odpowiedzb, odpowiedzc) VALUES 
('Czy szczurek może być sam w klatce?', 2, 'Może', 'Należy mieć conajmniej parę szczurków', 'Im więcej tym lepiej');


