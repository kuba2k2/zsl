-- 6.1. Podaj imię, nazwisko i czas zawodnika, który uzyskał najlepszy czas spośród wszystkich wyników osiągniętych przez zawodników. Jest tylko jeden taki zawodnik.
SELECT imie, nazwisko, czas FROM zawodnicy JOIN startujacy USING(id_zawodnika) JOIN czasy USING(id_startu) ORDER BY czas ASC LIMIT 1;
"imie"	"nazwisko"	"czas"
"Chris"	"Froome"	"83:56:40"

-- 6.2. Który zawodnik z Polski uczestniczył w największej liczbie wyścigów? Podaj jego imię, nazwisko i liczbę wyścigów, w których uczestniczył. Jest tylko jeden taki zawodnik.
SELECT imie, nazwisko, COUNT(*) AS liczba FROM zawodnicy JOIN startujacy USING(id_zawodnika) WHERE obywatel_kraju = "Polska" GROUP BY id_zawodnika ORDER BY liczba DESC LIMIT 1;
"imie"	"nazwisko"	"liczba"
"Maciej"	"Bodnar"	"5"

-- 6.3. Podaj imiona i nazwiska najmłodszych uczestników wyścigu w kolejnych latach. Do obliczeń wykorzystaj rocznikowy wiek zawodnika, tj. liczbę lat, którą zawodnik ukończył w roku zawodów.
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2008 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2008
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2009 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2009
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2010 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2010
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2011 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2011
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2012 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2012
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2013 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2013
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2014 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2014
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2015 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2015
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2016 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2016
)
UNION
SELECT rok, imie, nazwisko
FROM zawodnicy
JOIN startujacy USING(id_zawodnika)
WHERE rok = 2017 AND rok-YEAR(data) = (
	SELECT MIN(rok-YEAR(data))
	FROM zawodnicy
	JOIN startujacy USING(id_zawodnika)
	WHERE rok = 2017
);
"rok"	"imie"	"nazwisko"
"2008"	"Gerald"	"Ciolek"
"2008"	"John-Lee"	"Augustyn"
"2008"	"Roman"	"Kreuziger"
"2009"	"Rigoberto"	"Uran"
"2010"	"Fabio"	"Felline"
"2011"	"Anthony"	"Delaplace"
"2012"	"Peter"	"Sagan"
"2012"	"Thibaut"	"Pinot"
"2013"	"Danny"	"van Poppel"
"2014"	"Danny"	"van Poppel"
"2015"	"Merhawi"	"Kudus"
"2016"	"Alexis"	"Gougeard"
"2016"	"Dylan"	"Groenewegen"
"2016"	"Timo"	"Roosen"
"2016"	"Sondre Holst"	"Enger"
"2016"	"Luka"	"Pibernik"
"2017"	"Elie"	"Gesbert"

-- 6.4. W którym roku nie ukończyła wyścigu największa grupa zawodników? Podaj rok oraz liczbę zawodników, którzy nie ukończyli wyścigu (jest tylko jeden taki rok).
SELECT rok, COUNT(*) AS liczba FROM startujacy LEFT JOIN czasy USING(id_startu) WHERE czas IS NULL GROUP BY rok ORDER BY liczba DESC LIMIT 1;
"rok"	"liczba"
"2012"	"46"

-- 6.5. W jednej grupie mogą startować zawodnicy, którzy pochodzą z różnych państw. Bywa też tak, że zawodnicy jednej grupy pochodzą z tego samego kraju.
-- Utwórz zestawienie zawierające dla każdego roku liczbę takich grup, w których wszyscy zawodnicy byli obywatelami jednego kraju.
-- Podaj rok, w którym grup z wszystkimi zawodnikami z jednego kraju było najwięcej, oraz podaj nazwy tych grup. Jest tylko jeden taki rok.
SELECT rok, COUNT(*) AS il_grup FROM (
	SELECT rok, kod_grupy, COUNT(*) AS kraje FROM (
		SELECT DISTINCT rok, obywatel_kraju, kod_grupy
		FROM startujacy
		JOIN zawodnicy USING(id_zawodnika)
		JOIN grupy USING(kod_grupy)
		WHERE rok = 2011
	) a GROUP BY kod_grupy HAVING kraje = 1
) c;
"rok"	"il_grup"
"2008"	"1"
"2009"	"1"
"2010"	"1"
"2011"	"4"
"2012"	"2"
"2013"	"2"
"2014"	"2"
"2015"	"1"
"2016"	"0"
"2017"	"1"
Rok 2011, grupy z jednego kraju:
Direct Energie
Euskaltel-Euskadi
Team Katusha
Sojasun

-- 6.6. Czasami zawodnicy zmieniają obywatelstwo i reprezentują wtedy inny kraj. Podaj imiona i nazwiska zawodników, którzy zmieniali obywatelstwo, oraz nazwy państw, które reprezentowali.
SELECT DISTINCT imie, nazwisko, obywatel_kraju FROM startujacy JOIN (
	SELECT imie, nazwisko, id_zawodnika, COUNT(*) AS kraje FROM (
		SELECT DISTINCT imie, nazwisko, id_zawodnika, obywatel_kraju
		FROM startujacy
		JOIN zawodnicy USING(id_zawodnika)
	) a GROUP BY id_zawodnika HAVING kraje > 1
) b USING(id_zawodnika);
"imie"	"nazwisko"	"obywatel_kraju"
"Chris"	"Froome"	"Kenia"
"Chris"	"Froome"	"Wielka Brytania"
"Heinrich"	"Haussler"	"Niemcy"
"Heinrich"	"Haussler"	"Australia"
