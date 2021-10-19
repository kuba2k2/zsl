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
