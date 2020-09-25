-- a)
SELECT domki.NrDomku, SUM(rezerwacje.LiczbaDni) AS SumaDni FROM domki JOIN rezerwacje USING(NrDomku) GROUP BY NrDomku;

-- b)
SELECT Nazwisko, Imie FROM pracownicy JOIN rezerwacje USING(IdPracownika) JOIN domki USING(NrDomku) WHERE NrDomku = 2 ORDER BY Imie ASC;

-- c)
SELECT Nazwisko, Imie, CenaZaDobe*LiczbaDni AS Kwota FROM rezerwacje JOIN domki USING(NrDomku) JOIN pracownicy USING(IdPracownika) ORDER BY Kwota DESC LIMIT 1;

-- d)
SELECT COUNT(*), Garaz FROM rezerwacje JOIN domki USING(NrDomku) GROUP BY Garaz;

-- e)
SELECT NrDomku, MAX(LiczbaDni) AS MaxLiczbaDni FROM rezerwacje GROUP BY NrDomku;
