-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               10.4.17-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych select11
CREATE DATABASE IF NOT EXISTS `select11` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `select11`;

-- Zrzut struktury tabela select11.firmy
CREATE TABLE IF NOT EXISTS `firmy` (
  `firma` varchar(20) NOT NULL,
  `kraj` varchar(20) DEFAULT NULL,
  `segment` char(1) DEFAULT NULL,
  PRIMARY KEY (`firma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli select11.firmy: ~0 rows (około)
/*!40000 ALTER TABLE `firmy` DISABLE KEYS */;
INSERT INTO `firmy` (`firma`, `kraj`, `segment`) VALUES
	('Bociek', 'Polska', 'M'),
	('Bogacki', 'Polska', 'M'),
	('Ekretyd', 'Polska', 'M'),
	('Esperatio', 'Francja', 'D'),
	('Inkaso', 'Polska', 'D'),
	('Kredito', 'Polska', 'M'),
	('Provident', 'USA', 'D');
/*!40000 ALTER TABLE `firmy` ENABLE KEYS */;

-- Zrzut struktury tabela select11.klienci
CREATE TABLE IF NOT EXISTS `klienci` (
  `id_klienta` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `plec` char(1) DEFAULT NULL,
  `wiek` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_klienta`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli select11.klienci: ~0 rows (około)
/*!40000 ALTER TABLE `klienci` DISABLE KEYS */;
INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `plec`, `wiek`) VALUES
	(1, 'Marek', 'Kowalski', 'm', 24),
	(2, 'Emil', 'Wierzbowski', 'm', 35),
	(3, 'Alojzy', 'Boruch', 'm', 18),
	(4, 'Lucjan', 'Minski', 'm', 60),
	(5, 'Joanna', 'Bawol', 'k', 46),
	(6, 'Adrianna', 'Musial', 'k', 19),
	(7, 'Jerzy', 'Powabski', 'm', 55),
	(8, 'Krzysztof', 'Nowak', 'm', 70),
	(9, 'Monika', 'Lisicka', 'k', 46),
	(10, 'Izydor', 'Kaplicki', 'm', 57),
	(11, 'Julia', 'Wolska', 'k', 19),
	(12, 'Julian', 'Wolski', 'm', 73),
	(13, 'Magda', 'Rosicka', 'k', 64),
	(14, 'Karol', 'Mol', 'm', 32),
	(15, 'Irena', 'Krol', 'k', 29);
/*!40000 ALTER TABLE `klienci` ENABLE KEYS */;

-- Zrzut struktury tabela select11.pozyczki
CREATE TABLE IF NOT EXISTS `pozyczki` (
  `id_pozyczki` int(11) NOT NULL AUTO_INCREMENT,
  `id_klienta` int(11) DEFAULT NULL,
  `firma` varchar(20) DEFAULT NULL,
  `kwota` int(11) DEFAULT NULL,
  `okres_splaty` int(11) DEFAULT NULL,
  `oprocentowanie` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_pozyczki`),
  KEY `id_klienta` (`id_klienta`),
  KEY `firma` (`firma`),
  CONSTRAINT `firma` FOREIGN KEY (`firma`) REFERENCES `firmy` (`firma`),
  CONSTRAINT `id_klienta` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli select11.pozyczki: ~0 rows (około)
/*!40000 ALTER TABLE `pozyczki` DISABLE KEYS */;
INSERT INTO `pozyczki` (`id_pozyczki`, `id_klienta`, `firma`, `kwota`, `okres_splaty`, `oprocentowanie`) VALUES
	(1, 1, 'Kredito', 3000, 12, 5.50),
	(2, 1, 'Bociek', 2000, 6, 6.50),
	(3, 2, 'Kredito', 5000, 5, 3.50),
	(4, 3, 'Provident', 7000, 18, 4.50),
	(5, 1, 'Kredito', 1000, 3, 3.50),
	(6, 4, 'Ekretyd', 2000, 3, 5.00),
	(7, 5, 'Provident', 7000, 12, 5.00),
	(8, 7, 'Esperatio', 5000, 12, 3.00),
	(9, 7, 'Esperatio', 4000, 6, 4.50),
	(10, 6, 'Ekretyd', 2500, 6, 3.00),
	(11, 8, 'Kredito', 3500, 10, 3.00),
	(12, 9, 'Bogacki', 1500, 3, 8.50),
	(13, 10, 'Provident', 4500, 12, 4.50),
	(14, 11, 'Provident', 500, 2, 10.00),
	(15, 11, 'Kredito', 500, 2, 12.00),
	(16, 12, 'Bociek', 2500, 3, 5.00),
	(17, 13, 'Bociek', 1000, 3, 5.00),
	(18, 13, 'Inkaso', 5500, 6, 7.00),
	(19, 14, 'Bogacki', 2000, 12, 8.00),
	(20, 8, 'Bogacki', 1000, 3, 9.00),
	(21, 9, 'Provident', 1000, 3, 11.00),
	(22, 3, 'Provident', 2500, 6, 10.00),
	(23, 2, 'Bociek', 4000, 6, 12.00),
	(24, 7, 'Inkaso', 1500, 3, 7.00),
	(25, 12, 'Esperatio', 2500, 5, 6.00);
/*!40000 ALTER TABLE `pozyczki` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
