-- 6.1. Podaj kwotę, jaką za wszystkie wizyty zapłaciła Alicja Kowalska.
SELECT SUM(cena) AS kwota FROM klienci
JOIN wizytydane USING(id_klienta)
JOIN wizytyzabiegi USING(id_wizyty)
JOIN zabiegi USING(kod_zabiegu)
WHERE imie = "Alicja" AND nazwisko = "Kowalska";

-- 6.2. Podaj imię i nazwisko oraz liczbę wizyt klienta, który najczęściej korzystał z usług salonu.
SELECT imie, nazwisko, COUNT(*) AS ilosc FROM klienci
JOIN wizytydane USING(id_klienta)
GROUP BY id_klienta
ORDER BY ilosc DESC
LIMIT 1;

-- 6.3. Podaj liczbę oraz daty (w porządku nierosnącym) wszystkich wizyt w salonie, podczas których wykonano zabieg Magia Hawajów („Magia Hawajow”).
SELECT COUNT(*) AS ilosc FROM wizytyzabiegi
JOIN zabiegi USING(kod_zabiegu)
JOIN wizytydane USING(id_wizyty)
WHERE zabieg = "Magia Hawajow"
ORDER BY data DESC;

SELECT data FROM wizytyzabiegi
JOIN zabiegi USING(kod_zabiegu)
JOIN wizytydane USING(id_wizyty)
WHERE zabieg = "Magia Hawajow"
GROUP BY id_wizyty
ORDER BY data DESC;

-- 6.4. W dniach od 6 grudnia 2017 roku do 15 stycznia 2018 roku (włącznie) salon urody „BEAUTY”
-- oferował dla Pań 20% zniżkę na dowolny makijaż.
-- Podaj liczbę różnych kobiet, które skorzystały z promocji w tym okresie (czyli wykonywały
-- dowolny makijaż w tym okresie).
-- Podaj, ile łącznie zapłaciły za makijaż wszystkie kobiety, które skorzystały z promocji
-- (pamiętaj o uwzględnieniu 20% zniżki).
SELECT COUNT(*) AS ilosc FROM (
	SELECT id_klienta FROM klienci
	JOIN wizytydane USING(id_klienta)
	JOIN wizytyzabiegi USING(id_wizyty)
	JOIN zabiegi USING(kod_zabiegu)
	WHERE data BETWEEN "2017-12-06" AND "2018-01-15" AND id_klienta LIKE "X%" AND dzial = "MAKIJAZ"
	GROUP BY id_klienta
) AS a;

SELECT (SUM(cena) * 0.8) AS kwota FROM klienci
JOIN wizytydane USING(id_klienta)
JOIN wizytyzabiegi USING(id_wizyty)
JOIN zabiegi USING(kod_zabiegu)
WHERE data BETWEEN "2017-12-06" AND "2018-01-15" AND id_klienta LIKE "X%" AND dzial = "MAKIJAZ";

-- 6.5. Podaj nazwy zabiegów z działu „Fryzjer męski”, z których nikt nie skorzystał w okresie, który obejmują dane (czyli od 10 listopada 2017 roku do 27 stycznia 2018 roku).
SELECT zabieg FROM zabiegi
LEFT JOIN wizytyzabiegi USING(kod_zabiegu)
WHERE dzial = "FRYZJER MESKI" AND id_wizyty IS NULL;
