SELECT Rodzina, COUNT(*) AS Ilosc FROM jezyki GROUP BY Rodzina ORDER BY Ilosc DESC;

SELECT COUNT(*) FROM jezyki
LEFT JOIN (SELECT * FROM uzytkownicy WHERE Urzedowy = "tak") a ON a.Jezyk = jezyki.Nazwa
WHERE Panstwo IS NULL;

SELECT Jezyk FROM (
	SELECT DISTINCT Jezyk, Kontynent FROM jezyki
	JOIN uzytkownicy ON jezyki.Nazwa = uzytkownicy.Jezyk
	JOIN panstwa ON uzytkownicy.Panstwo = panstwa.Nazwa
	ORDER BY jezyki.Nazwa ASC
) AS a
GROUP BY Jezyk
HAVING COUNT(*) >= 4;

SELECT Jezyk, Rodzina, sum(Uzytkownicy) FROM uzytkownicy
INNER JOIN jezyki ON uzytkownicy.Jezyk = jezyki.Nazwa
INNER JOIN panstwa ON uzytkownicy.Panstwo = panstwa.Nazwa
where Rodzina NOT LIKE 'indoeuropejska' AND
Kontynent LIKE 'Ameryka%'
GROUP BY jezyki.Nazwa
ORDER BY sum(Uzytkownicy) DESC
LIMIT 6

SELECT panstwa.Nazwa, jezyki.Nazwa, round(Uzytkownicy / Populacja * 100, 2) AS procent
FROM panstwa
INNER JOIN uzytkownicy ON uzytkownicy.Panstwo = panstwa.Nazwa
INNER JOIN jezyki ON uzytkownicy.Jezyk = jezyki.Nazwa
where Urzedowy LIKE 'nie' AND
(Uzytkownicy/Populacja) >= 0.3
