-- 2 punkty
CREATE TABLE produkty (
    ID_Produktu INT UNSIGNED PRIMARY KEY,
    Nazwa_produktu VARCHAR(50) NOT NULL,
    Grupa_towarowa VARCHAR(50) NOT NULL,
    Producent VARCHAR(20) NOT NULL,
    Cena_brutto FLOAT UNSIGNED NOT NULL
);

CREATE TABLE klienci (
    ID_klienta CHAR(5) PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL
);

-- relacje 2 punkty
CREATE TABLE zamowienia (
	ID_zamowienia VARCHAR(16) PRIMARY KEY,
	Data DATE NOT NULL,
	ID_Produktu INT UNSIGNED NOT NULL,
	ID_klienta CHAR(5) NOT NULL,
	Liczba_sztuk INT UNSIGNED NOT NULL,
	FOREIGN KEY(ID_Produktu) REFERENCES produkty(ID_Produktu),
	FOREIGN KEY(ID_klienta) REFERENCES klienci(ID_klienta)
);

-- zad 1.
SELECT imie, nazwisko FROM zamowienia JOIN klienci USING(ID_klienta) JOIN produkty USING(ID_Produktu) WHERE Producent = "HW" AND Grupa_towarowa = "Notebooki" ORDER BY nazwisko ASC;

-- zad 2.
SELECT Nazwa_produktu, Grupa_towarowa, Producent FROM zamowienia JOIN klienci USING(ID_klienta) JOIN produkty USING(ID_Produktu) WHERE imie = "Anna" AND nazwisko = "Kotnicka";

-- zad 3.
SELECT imie, nazwisko, COUNT(*) AS Ilosc FROM zamowienia JOIN klienci USING(ID_klienta) GROUP BY ID_klienta ORDER BY Ilosc DESC LIMIT 1;

-- zad 4.
SELECT imie, nazwisko FROM zamowienia JOIN klienci USING(ID_klienta) JOIN produkty USING(ID_Produktu) GROUP BY ID_klienta ORDER BY SUM(Cena_brutto * Liczba_sztuk) DESC LIMIT 3;

-- zad 5.
SELECT SUM(Liczba_sztuk) FROM zamowienia JOIN produkty USING(ID_Produktu) WHERE YEAR(Data) = 2013 AND MONTH(Data) = 3 AND Grupa_towarowa = "Notebooki";
