CREATE DATABASE zsl;
USE zsl;
CREATE TABLE tablice (
	ozn VARCHAR(6) PRIMARY KEY, 
	powiat VARCHAR(40) NOT NULL, 
	siedziba VARCHAR(30) NOT NULL, 
	typ ENUM('z', 'g', 's') NOT NULL
);
CREATE TABLE nip_firm (
	NIP CHAR(10) PRIMARY KEY, 
	firma VARCHAR(30) NOT NULL
);
CREATE TABLE uslugi (
	NIP CHAR(10) NOT NULL, 
	ozn VARCHAR(6) NOT NULL, 
	nr VARCHAR(5) NOT NULL, 
	rodzaj_uslugi ENUM('L', 'W') NOT NULL, 
	rata INTEGER NOT NULL, 
	FOREIGN KEY(NIP) REFERENCES nip_firm(NIP), 
	FOREIGN KEY(ozn) REFERENCES tablice(ozn), 
	PRIMARY KEY(ozn, nr)
);

LOAD DATA 
	LOCAL INFILE '/home/zsl/zsl/roz2012/tablice.txt' 
	INTO TABLE tablice 
	FIELDS TERMINATED BY '\t' 
	LINES TERMINATED BY '\r\n' 
	IGNORE 1 LINES;
LOAD DATA 
	LOCAL INFILE '/home/zsl/zsl/roz2012/nip_firm.txt' 
	INTO TABLE nip_firm 
	FIELDS TERMINATED BY '\t' 
	LINES TERMINATED BY '\r\n' 
	IGNORE 1 LINES;
LOAD DATA 
	LOCAL INFILE '/home/zsl/zsl/roz2012/uslugi.txt' 
	INTO TABLE uslugi 
	FIELDS TERMINATED BY '\t' 
	LINES TERMINATED BY '\r\n' 
	IGNORE 1 LINES;
