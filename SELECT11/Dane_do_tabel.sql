INSERT INTO `KLIENCI` (`id_klienta`, `imie`, `nazwisko`, `plec`, `wiek`) VALUES
('1', 'Marek', 'Kowalski', 'm', '24'),
('2', 'Emil', 'Wierzbowski', 'm', '35'),
('3', 'Alojzy', 'Boruch', 'm', '18'),
('4', 'Lucjan', 'Minski', 'm', '60'),
('5', 'Joanna', 'Bawol', 'k', '46'),
('6', 'Adrianna', 'Musial', 'k', '19'),
('7', 'Jerzy', 'Powabski', 'm', '55'),
('8', 'Krzysztof', 'Nowak', 'm', '70'),
('9', 'Monika', 'Lisicka', 'k', '46'),
('10', 'Izydor', 'Kaplicki', 'm', '57'),
('11', 'Julia', 'Wolska', 'k', '19'),
('12', 'Julian', 'Wolski', 'm', '73'),
('13', 'Magda', 'Rosicka', 'k', '64'),
('14', 'Karol', 'Mol', 'm', '32'),
('15', 'Irena', 'Krol', 'k', '29');



INSERT INTO `FIRMY` (`firma`, `kraj`, `segment`) VALUES
('Kredito', 'Polska', 'M'),
('Provident', 'USA', 'D'),
('Bociek', 'Polska', 'M'),
('Esperatio', 'Francja', 'D'),
('Ekretyd', 'Polska', 'M'),
('Inkaso', 'Polska', 'D'),
('Bogacki', 'Polska', 'M');


INSERT INTO `POZYCZKI` (`id_pozyczki`, `id_klienta`, `firma`, `kwota`, `okres_splaty`, `oprocentowanie`) VALUES
('1','1','Kredito','3000','12','5.5'),
('2','1','Bociek','2000','6','6.5'),
('3','2','Kredito','5000','5','3.5'),
('4','3','Provident','7000','18','4.5'),
('5','1','Kredito','1000','3','3.5'),
('6','4','Ekretyd','2000','3','5.0'),
('7','5','Provident','7000','12','5.0'),
('8','7','Esperatio','5000','12','3.0'),
('9','7','Esperatio','4000','6','4.5'),
('10','6','Ekretyd','2500','6','3.0'),
('11','8','Kredito','3500','10','3.0'),
('12','9','Bogacki','1500','3','8.5'),
('13','10','Provident','4500','12','4.5'),
('14','11','Provident','500','2','10.0'),
('15','11','Kredito','500','2','12.0'),
('16','12','Bociek','2500','3','5.0'),
('17','13','Bociek','1000','3','5.0'),
('18','13','Inkaso','5500','6','7.0'),
('19','14','Bogacki','2000','12','8.0'),
('20','8','Bogacki','1000','3','9.0'),
('21','9','Provident','1000','3','11.0'),
('22','3','Provident','2500','6','10.0'),
('23','2','Bociek','4000','6','12.0'),
('24','7','Inkaso','1500','3','7.0'),
('25','12','Esperatio','2500','5','6.0');
