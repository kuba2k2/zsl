-- 5.1. Utwórz zestawienie zawierające nazwiska i imiona zdających, którzy zdawali egzamin maturalny z informatyki. Wyniki uporządkuj alfabetycznie według nazwisk zdających.
SELECT DISTINCT nazwisko, imie FROM maturzysci
JOIN zdaje USING(Id_zdajacego)
JOIN przedmioty USING(Id_przedmiotu)
WHERE Nazwa_przedmiotu = "informatyka"
ORDER BY nazwisko ASC;

-- 5.2. Podaj nazwę przedmiotu, który był zdawany najczęściej jako przedmiot dodatkowy, oraz liczbę osób, które go wybrały.
SELECT Nazwa_przedmiotu, COUNT(*) AS Ilosc FROM przedmioty
JOIN zdaje USING(Id_przedmiotu)
WHERE Typ = "dodatkowy"
GROUP BY Id_przedmiotu
ORDER BY Ilosc DESC
LIMIT 1;

-- 5.3. Podaj nazwiska i imiona wszystkich zdających, którzy wybrali największą liczbę egzaminów maturalnych z przedmiotów dodatkowych, oraz podaj liczbę tych przedmiotów.
SELECT Nazwisko, Imie, COUNT(*) AS Ilosc FROM maturzysci
JOIN zdaje USING(Id_zdajacego)
JOIN przedmioty USING(Id_przedmiotu)
WHERE Typ = "dodatkowy"
GROUP BY Id_zdajacego
HAVING Ilosc = (
	SELECT COUNT(*) AS Ilosc FROM zdaje
	JOIN przedmioty USING(Id_przedmiotu)
	WHERE Typ = "dodatkowy"
	GROUP BY Id_zdajacego
	ORDER BY Ilosc DESC
	LIMIT 1
)
ORDER BY Ilosc DESC;

-- 5.4. Podaj nazwę przedmiotu dodatkowego, który nie został ani razu wybrany na egzaminie maturalnym.
SELECT Nazwa_przedmiotu FROM przedmioty
LEFT JOIN zdaje USING(Id_przedmiotu)
WHERE Typ = "dodatkowy" AND Id_zdajacego IS NULL;

-- 5.5. Podaj imię i nazwisko najmłodszego maturzysty oraz nazwy przedmiotów dodatkowych, które ta osoba wybrała na egzaminie maturalnym.
SELECT imie, nazwisko, Nazwa_przedmiotu FROM maturzysci
JOIN zdaje USING(Id_zdajacego)
JOIN przedmioty USING(Id_przedmiotu)
WHERE Data_urodzenia = (
	SELECT MAX(Data_urodzenia) AS Max_data FROM maturzysci
) AND Typ = "dodatkowy";

-- 5.6. Podaj liczbę mężczyzn, którzy przystąpili do egzaminu maturalnego. Wykorzystaj przedostatnią cyfrę numeru PESEL, która tylko dla mężczyzn jest nieparzysta.
SELECT COUNT(*) AS Ilosc FROM maturzysci
WHERE SUBSTR(Pesel, 10, 1) % 2 = 1;
