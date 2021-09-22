-- 1.
CREATE DATABASE IF NOT EXISTS KREDYTY_BD;
-- 2.
CREATE TABLE IF NOT EXISTS firmy (
  firma VARCHAR(20) NOT NULL,
  kraj VARCHAR(20),
  segment CHAR(1),
  PRIMARY KEY(firma)
);
CREATE TABLE IF NOT EXISTS klienci (
  id_klienta INT NOT NULL AUTO_INCREMENT,
  imie VARCHAR(20) NOT NULL,
  nazwisko VARCHAR(20) NOT NULL,
  plec CHAR(1),
  wiek INT,
  PRIMARY KEY(id_klienta)
);
CREATE TABLE IF NOT EXISTS pozyczki (
  id_pozyczki INT NOT NULL AUTO_INCREMENT,
  id_klienta INT,
  firma VARCHAR(20),
  kwota INT,
  okres_splaty INT,
  oprocentowanie DECIMAL(4,2),
  PRIMARY KEY(id_pozyczki),
  FOREIGN KEY(firma) REFERENCES firmy(firma),
  FOREIGN KEY(id_klienta) REFERENCES klienci(id_klienta)
);
-- 3.
-- zapytania w pliku dane_do_tabel.sql
-- 4.
SELECT * FROM firmy;
SELECT * FROM klienci;
SELECT * FROM pozyczki;
-- 5.

-- 1)
SELECT * FROM klienci
WHERE wiek BETWEEN 40 AND 60;

-- 2)
SELECT SUM(kwota) AS suma, firma
FROM pozyczki
GROUP BY firma
ORDER BY suma DESC;

-- 3)
SELECT COUNT(*) AS ilosc, plec
FROM pozyczki
NATURAL JOIN klienci
WHERE firma = "Provident"
GROUP BY plec;

-- 4)
SELECT SUM(kwota) AS suma, segment
FROM pozyczki
NATURAL JOIN firmy
GROUP BY segment;

-- 5) - w wyniku dwie osoby mają tą samą kwotę 7000 zł
SELECT klienci.*
FROM klienci
NATURAL JOIN pozyczki
ORDER BY kwota DESC
LIMIT 1;

-- 6)
SELECT COUNT(*) AS ilosc, firma
FROM pozyczki
NATURAL JOIN klienci
NATURAL JOIN firmy
WHERE kraj = "Polska"
GROUP BY firma;

-- 7)
SELECT AVG(okres_splaty) AS sredni_okres, firma
FROM pozyczki
GROUP BY firma
HAVING sredni_okres > 6;

-- 8)
SELECT klienci.*
FROM klienci
NATURAL JOIN pozyczki
WHERE okres_splaty > (SELECT AVG(okres_splaty) FROM pozyczki)
GROUP BY id_klienta;

-- 9)
SELECT kraj, COUNT(*) AS liczba, AVG(okres_splaty) AS sredni_okres
FROM firmy
NATURAL JOIN pozyczki
GROUP BY CASE WHEN kraj = "Polska" THEN "kraj" ELSE "zagranica" END;

-- 10)
SELECT nazwisko, imie, SUM(kwota) AS suma, AVG(okres_splaty) AS sredni_okres
FROM klienci
NATURAL JOIN pozyczki
GROUP BY id_klienta
ORDER BY suma DESC;

-- 11)
SELECT firma, COUNT(*) AS ilosc
FROM pozyczki
JOIN (
    SELECT firma, AVG(oprocentowanie) AS srednia
    FROM pozyczki
    GROUP BY firma
) AS srednie USING(firma)
WHERE oprocentowanie >= srednia
GROUP BY firma;

-- 12)
SELECT klienci.*
FROM klienci
LEFT JOIN pozyczki USING(id_klienta)
WHERE id_pozyczki IS NULL;
