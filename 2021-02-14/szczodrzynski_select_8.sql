-- B1
SELECT Country, COUNT(*) AS Cnt FROM countries GROUP BY Country HAVING Cnt >= 3;

-- B2
SELECT LastName, Address FROM persons WHERE `Name` LIKE "%en";

-- B3
SELECT * FROM orders ORDER BY P_Id DESC;

-- B4
SELECT City, COUNT(*) AS Cnt FROM persons GROUP BY City;

-- C1
SELECT LastName FROM persons JOIN orders USING(P_Id) WHERE OrderNo > 30000;

-- C2
SELECT Country, COUNT(*) AS Cnt FROM persons JOIN countries USING(City) GROUP BY Country;

-- C3
SELECT * FROM orders CROSS JOIN persons;

-- C4
SELECT `Name`, LastName, OrderNo FROM orders JOIN persons USING(P_Id);

-- C5
SELECT `Name`, LastName FROM persons LEFT OUTER JOIN orders USING(P_Id) WHERE OrderNo IS NULL;

-- C6
SELECT OrderNo, `Name`, LastName FROM orders RIGHT OUTER JOIN persons USING(P_Id) ORDER BY LastName ASC;

-- C7
SELECT OrderNo, `Name`, LastName FROM orders LEFT JOIN persons USING(P_Id)
UNION ALL
SELECT OrderNo, `Name`, LastName FROM orders RIGHT JOIN persons USING(P_Id) ORDER BY LastName ASC;

-- C8
SELECT LastName, Country FROM persons JOIN countries USING(City);

-- C9
SELECT OrderNo, LastName, City, Country FROM orders JOIN persons USING(P_Id) JOIN countries USING(City);

-- C10
SELECT persons.*, countries.Country FROM persons JOIN countries USING(City);