-- ALTER TABLE Oceny ADD FOREIGN KEY(IDucznia) REFERENCES Uczen(IDucznia);
-- ALTER TABLE Oceny ADD FOREIGN KEY(IDprzedmiotu) REFERENCES Przedmioty(IDprzedmiotu);

-- Poza rejonem szkoły leżą ulice Worcella oraz Sportowa. Podaj, ilu uczniów mieszka poza rejonem szkoły (czyli na jednej z tych dwóch ulic).
SELECT COUNT(*) FROM Uczen
WHERE ulica IN ("Worcella", "Sportowa");

-- Wypisz wszystkie oceny ucznia Jana Augustyniaka z języka polskiego.
SELECT Ocena FROM Oceny
JOIN Uczen USING(IDucznia)
JOIN Przedmioty USING(IDprzedmiotu)
WHERE imie = "Jan" AND nazwisko = "Augustyniak" AND NazwaPrzedmiotu = "polski";

-- Oblicz, ile dziewcząt i ilu chłopców jest w poszczególnych klasach.
-- Wynik przedstaw w postaci zestawienia: idKlasy, liczba dziewcząt, liczba chłopców.
-- Załóż, że imiona dziewcząt (i tylko dziewcząt) kończą się na literę a.
SELECT IDklasy, COUNT(*) AS Dziewczeta, Chlopcy
FROM Uczen 
LEFT JOIN (
	SELECT IDklasy, COUNT(*) AS Chlopcy
	FROM Uczen
	WHERE imie NOT LIKE "%a"
	GROUP BY IDklasy
) AS ch USING (IDklasy)
WHERE imie LIKE "%a"
GROUP BY IDklasy;

-- Utwórz zestawienie dla klasy 2a zawierające nazwy przedmiotów i średnie ocen klasy
-- z tych przedmiotów (średnie podaj z zaokrągleniem do dwóch miejsc po przecinku)
-- Zestawienie posortuj nierosnąco według średnich ocen.
SELECT NazwaPrzedmiotu, ROUND(AVG(Ocena), 2) AS Srednia
FROM Oceny
JOIN Przedmioty USING(IDprzedmiotu)
JOIN Uczen USING(IDucznia)
WHERE IDklasy = "2a"
GROUP BY IDprzedmiotu
ORDER BY AVG(Ocena) DESC;

-- Utwórz zestawienie uporządkowane alfabetycznie według nazwisk zawierające wykaz
-- osób z klasy 2c, które w kwietniu 2009 roku otrzymały oceny niedostateczne (imię,
-- nazwisko, przedmiot).
SELECT DISTINCT imie, nazwisko, NazwaPrzedmiotu FROM Oceny
JOIN Uczen USING(IDucznia)
JOIN Przedmioty USING(IDprzedmiotu)
WHERE IDklasy = "2c" AND Ocena = 1 AND Data LIKE "2009-04-%"
ORDER BY nazwisko ASC;

-- Podaj nazwisko, imię, klasę oraz średnią ocen osoby, która osiągnęła najwyższą średnią
-- ocen w całej szkole (jest tylko jedna taka osoba).
SELECT nazwisko, imie, IDklasy, AVG(Ocena) AS Srednia
FROM Oceny
JOIN Uczen USING(IDucznia)
GROUP BY IDucznia
ORDER BY Srednia DESC
LIMIT 1;
