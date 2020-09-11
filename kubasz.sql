DROP DATABASE IF EXISTS `zsl`;
CREATE DATABASE `zsl`;
USE `zsl`;
CREATE TABLE `mamy` (matka_id INTEGER PRIMARY KEY AUTO_INCREMENT, imie VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL, wiek INTEGER NOT NULL);
CREATE TABLE `noworodki` (id INTEGER PRIMARY KEY AUTO_INCREMENT, plec ENUM('c', 's') NOT NULL, imie VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL, data_urodzenia CHAR(11) NOT NULL, waga INTEGER NOT NULL, wzrost INTEGER NOT NULL, matka_id INTEGER NOT NULL);
TRUNCATE mamy;
LOAD DATA INFILE 'c:\\Users\\user\\Desktop\\mamy.txt' INTO TABLE mamy FIELDS TERMINATED BY ' ' LINES TERMINATED BY '\r\n';
TRUNCATE noworodki;
LOAD DATA INFILE 'c:\\Users\\user\\Desktop\\noworodki.txt' INTO TABLE noworodki FIELDS TERMINATED BY ' ' LINES TERMINATED BY '\r\n';

-- a)
SELECT imie, wzrost FROM noworodki GROUP BY plec ORDER BY plec DESC, wzrost;

-- b)
SELECT COUNT(*) AS liczba, data_urodzenia FROM noworodki GROUP BY data_urodzenia ORDER BY liczba DESC LIMIT 1;

-- c)
SELECT mamy.imie FROM mamy JOIN noworodki USING(matka_id) WHERE mamy.wiek < 25 AND noworodki.waga > 4000 GROUP BY matka_id;

-- d)
SELECT noworodki.imie, data_urodzenia FROM noworodki JOIN mamy USING(matka_id, imie);

-- e)
SELECT data_urodzenia FROM (SELECT COUNT(*) AS liczba, data_urodzenia FROM noworodki GROUP BY matka_id, data_urodzenia) AS a WHERE liczba > 1;
