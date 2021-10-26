-- Podaj liczbę kobiet i liczbę mężczyzn uczestniczących w ankiecie. Możesz wykorzystać fakt, że w danych imiona wszystkich kobiet (i tylko kobiet) kończą się literą „a”.
SELECT IF(RIGHT(imie, 1) = "a", "kobieta", "mezczyzna") AS plec, COUNT(*) AS ilosc FROM ankieta GROUP BY plec;

-- Utwórz zestawienie zawierające nazwy poszczególnych środków lokomocji oraz liczby ankietowanych z województwa mazowieckiego korzystających z nich latem
SELECT Srod_lok, COUNT(*) AS Ilosc FROM lokata JOIN ankieta ON Id_ank = ankieta.Id WHERE Wojewodztwo = "mazowieckie" AND Pora_roku = "lato" GROUP BY Srod_lok;

-- Utwórz zestawienie zawierające nazwy województw, w których w badaniu wzięło udział więcej niż 20 osób. Dla każdego z tych województw podaj liczbę ankietowanych osób.
SELECT Wojewodztwo, COUNT(*) AS Ilosc FROM ankieta GROUP BY Wojewodztwo HAVING Ilosc > 20;

-- Znajdź  ankietowanych,  którzy  są  w  wieku  powyżej  50  lat,  mają  wykształcenie  wyższe (wyzsze) lub średnie (srednie) oraz nie interesują się ani informatyką (informatyka), ani grami komputerowymi (gry komputerowe). Utwórz zestawienie (posortowane alfabetycznie  według  nazwiska) zawierające  imiona  i  nazwiska  tych  ankietowanych  oraz nazwy województw, z których oni pochodzą. W zestawieniu dane każdej osoby mogą wystąpić tylko raz.
SELECT DISTINCT Imie, Nazwisko, Wojewodztwo FROM ankieta 
LEFT JOIN (
	SELECT * FROM zainteresowania 
	WHERE zainteresowania IN ("informatyka", "gry komputerowe")
) AS zaint ON ankieta.Id = zaint.Id_ank 
WHERE Wiek > 50 
AND Wyksztalcenie IN ("wyzsze", "srednie")
AND zainteresowania IS NULL
ORDER BY Nazwisko ASC;

-- Podaj średni dochód kobiet z województwa zachodniopomorskiego, dla których jednym ze środków lokomocji jest rower.
SELECT AVG(Dochod) FROM (
	SELECT Dochod FROM ankieta
	JOIN lokata ON ankieta.Id = lokata.Id_ank
	WHERE Imie LIKE "%a"
	AND Wojewodztwo = "zachodniopomorskie"
	AND Srod_lok = "rower"
	GROUP BY Id
) a;
