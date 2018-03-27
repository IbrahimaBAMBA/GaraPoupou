#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE `GaraPoupou`
CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `GaraPoupou`;

#------------------------------------------------------------
# Table: piupiu_users
#------------------------------------------------------------

CREATE TABLE `piupiu_users`(
        `id`                  int (11) Auto_increment  NOT NULL ,
        `lastName`            Varchar (30) NOT NULL ,
        `firstName`           Varchar (25) NOT NULL ,
        `phoneNumber`        Int NOT NULL ,
        `email`               Varchar (255) NOT NULL ,
        `password`            Varchar (60) NOT NULL ,
        `activityDescription` Text ,
        `idCommunes`  Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_exploitations
#------------------------------------------------------------

CREATE TABLE `piupiu_exploitations`(
        `id`                 int (11) Auto_increment  NOT NULL ,
        `name`               Varchar (30) NOT NULL ,
        `phoneNumber`        Int NOT NULL ,
        `imageLink`          Varchar (30) NULL ,
        `idUsers`    Int NOT NULL ,
        `idCommunes` Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_hauliers
#------------------------------------------------------------

CREATE TABLE `piupiu_hauliers`(
        `id`              int (11) Auto_increment  NOT NULL ,
        `name`            Varchar (30) NOT NULL ,
        `phoneNumber`     Varchar (10) NOT NULL ,
        `idUsers` Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_trucks
#------------------------------------------------------------

CREATE TABLE `piupiu_trucks`(
        `id`                 int (11) Auto_increment  NOT NULL ,
        `name`               Varchar (30) NOT NULL ,
        `volume`             Varchar (30) NOT NULL ,
        `imageLink`          Varchar (30) NULL ,
        `idHauliers` Int NOT NULL ,
        `idCommunes` Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_productDetails
#------------------------------------------------------------

CREATE TABLE `piupiu_productDetails`(
        `id`                        int (11) Auto_increment  NOT NULL ,
        `name`                      Varchar (25) NULL ,
        `imageLink`                 Varchar (30) NOT NULL ,
        `publicationDate`           Datetime NOT NULL ,
        `idProductTypes`    Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_wholesalePrices
#------------------------------------------------------------

CREATE TABLE `piupiu_wholesalePrices`(
        `id`                       int (11) Auto_increment  NOT NULL ,
        `price`                    Varchar (25) NOT NULL ,
        `startDate`                Date NOT NULL ,
        `idProductDetails` Int NOT NULL ,
        `idCommunes`       Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_productTypes
#------------------------------------------------------------

CREATE TABLE `piupiu_productTypes`(
        `id`                          int (11) Auto_increment  NOT NULL ,
        `name`                 Varchar (30) NOT NULL ,
        `idProductCategories` Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_productCategories
#------------------------------------------------------------

CREATE TABLE `piupiu_productCategories`(
        `id`          int (11) Auto_increment  NOT NULL ,
        `name` Varchar (30) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_communes
#------------------------------------------------------------

CREATE TABLE `piupiu_communes`(
        `id`                        int (11) Auto_increment  NOT NULL ,
        `name`                      Varchar (25) NOT NULL ,
        `idDepartments`     Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_departments
#------------------------------------------------------------

CREATE TABLE `piupiu_departments`(
        `id`                int (11) Auto_increment  NOT NULL ,
        `name`              Varchar (25) NOT NULL ,
        `idRegions` Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_regions
#------------------------------------------------------------

CREATE TABLE `piupiu_regions`(
        `id`   int (11) Auto_increment  NOT NULL ,
        `name` Varchar (25) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piupiu_proposals
#------------------------------------------------------------

CREATE TABLE piupiu_proposals(
        `id`                       int (11) Auto_increment  NOT NULL ,
        `idExploitations`  Int NOT NULL ,
        `idProductDetails` Int NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;

ALTER TABLE `piupiu_users` ADD CONSTRAINT FK_users_id_Communes FOREIGN KEY (`idCommunes`) REFERENCES `piupiu_communes`(`id`);
ALTER TABLE `piupiu_exploitations` ADD CONSTRAINT FK_exploitations_idUsers FOREIGN KEY (`idUsers`) REFERENCES `piupiu_users`(`id`);
ALTER TABLE `piupiu_exploitations` ADD CONSTRAINT FK_exploitations_idCommunes FOREIGN KEY (`idCommunes`) REFERENCES `piupiu_communes`(`id`);
ALTER TABLE `piupiu_hauliers` ADD CONSTRAINT FK_hauliers_idUsers FOREIGN KEY (`idUsers`) REFERENCES `piupiu_users`(`id`);
ALTER TABLE `piupiu_trucks` ADD CONSTRAINT FK_trucks_idHauliers FOREIGN KEY (`idHauliers`) REFERENCES `piupiu_hauliers`(`id`);
ALTER TABLE `piupiu_trucks` ADD CONSTRAINT FK_trucks_idCommunes FOREIGN KEY (`idCommunes`) REFERENCES `piupiu_communes`(`id`);
ALTER TABLE `piupiu_productDetails` ADD CONSTRAINT FK_productDetails_idProductTypes FOREIGN KEY (`idProductTypes`) REFERENCES `piupiu_productTypes`(`id`);
ALTER TABLE `piupiu_wholesalePrices` ADD CONSTRAINT FK_wholesalePrices_idProductDetails FOREIGN KEY (`idProductDetails`) REFERENCES `piupiu_productDetails`(`id`);
ALTER TABLE `piupiu_wholesalePrices` ADD CONSTRAINT FK_wholesalePrices_idCommunes FOREIGN KEY (`idCommunes`) REFERENCES `piupiu_communes`(`id`);
ALTER TABLE `piupiu_productTypes` ADD CONSTRAINT FK_productTypes_idProductCategories FOREIGN KEY (`idProductCategories`) REFERENCES `piupiu_productCategories`(`id`);
ALTER TABLE `piupiu_communes` ADD CONSTRAINT FK_communes_idDepartments FOREIGN KEY (`idDepartments`) REFERENCES `piupiu_departments`(`id`);
ALTER TABLE `piupiu_departments` ADD CONSTRAINT FK_departments_idRegions FOREIGN KEY (`idRegions`) REFERENCES `piupiu_regions`(`id`);
ALTER TABLE `piupiu_proposals` ADD CONSTRAINT FK_proposals_idExploitations FOREIGN KEY (`idExploitations`) REFERENCES `piupiu_exploitations`(`id`);
ALTER TABLE `piupiu_proposals` ADD CONSTRAINT FK_proposals_idProductDetails FOREIGN KEY (`idProductDetails`) REFERENCES `piupiu_productDetails`(`id`);

INSERT INTO `piupiu_regions` (`id`, `name`) VALUES
(1, 'Abidjan'),
(2, 'Agnéby-Tiassa'),
(3, 'Bagoué'),
(4, 'Bélier'),
(5, 'Béré'),
(6, 'Bounkani'),
(7, 'Cavally'),
(8, 'Folon'),
(9, 'Gbêkê'),
(10, 'Gbôklê'),
(11, 'Gôh'),
(12, 'Gontougo'),
(13, 'Grands ponts'),
(14, 'Guémon'),
(15, 'Haut-Sassandra'),
(16, 'Hambol'),
(17, 'Iffou'),
(18, 'Indénié-Djuablin'),
(19, 'Kabadougou'),
(20, 'Lôh-Djiboua'),
(21, 'Marahoué'),
(22, 'Mé'),
(23, 'Morounou'),
(24, 'Nawa'),
(25, 'Nzi'),
(26, 'Poro'),
(27, 'San Pedro'),
(28, 'Sud-Comoé'),
(29, 'Tchologo'),
(30, 'Tonkpi'),
(31, 'Worodougou'),
(32, 'Yamoussoukro'),
(33, 'Bafing');

INSERT INTO `piupiu_departments` (`id`, `name`, `idRegions`) VALUES
(1, 'Abengourou', 18),
(3, 'Abidjan', 1),
(4, 'Agnibilékrou', 18),
(5, 'Aboisso', 28),
(6, 'Adiaké', 26),
(7, 'Adzopé', 22),
(8, 'Akoupé', 22),
(9, 'Alépé', 22),
(10, 'Agboville', 2),
(11, 'Arrah', 23),
(12, 'Bangolo', 14),
(13, 'Béoumi', 9),
(14, 'Béttié', 18),
(15, 'Biankouman', 30),
(16, 'Blolequin', 7),
(17, 'Bocanda', 25),
(18, 'Bongouanou', 23),
(19, 'Botro', 9),
(20, 'Buyo', 24),
(21, 'Bouaflé', 21),
(22, 'Bouaké', 9),
(23, 'Bouna', 6),
(24, 'Bondoukou', 12),
(25, 'Boundiali', 3),
(26, 'Dabakala', 16),
(27, 'Dabou', 13),
(28, 'Danane', 30),
(29, 'Daloa', 15),
(30, 'Daoukro', 17),
(31, 'Dianra', 5),
(32, 'Didiévi', 4),
(33, 'Dikodougou', 26),
(34, 'Dimbokro', 25),
(35, 'Divo', 20),
(36, 'Djékanou', 4),
(37, 'Doropo', 6),
(38, 'Duékoué', 14),
(39, 'Facobly', 14),
(40, 'Ferkessédougou', 29),
(41, 'Fresco', 10),
(42, 'Gagnoa', 11),
(43, 'Gbéléban', 19),
(44, 'Grand Bassam', 28),
(45, 'Grand Lahou', 13),
(46, 'Guiembe', 26),
(47, 'Gueyo', 24),
(48, 'Guiglo', 7),
(49, 'Guitry', 20),
(50, 'Issia', 15),
(51, 'Jacqueville', 13),
(52, 'Kani', 31),
(53, 'Kaniasso', 8),
(54, 'Katiola', 16),
(55, 'kong', 29),
(56, 'Korhogo', 26),
(57, 'Koro', 33),
(58, 'Kouassi-kouassikro', 25),
(59, 'Kounahiri', 5),
(60, 'Koun-fao', 12),
(61, 'Kouibly', 14),
(62, 'Kouto', 3),
(63, 'Lakota', 20),
(64, 'Madinani', 19),
(65, 'Man', 30),
(66, 'Mankono', 5),
(67, 'Mbahiakro', 17),
(68, 'Mbatto', 23),
(69, 'Meagui', 24),
(70, 'Minignan', 8),
(71, 'Nassian', 6),
(72, 'Niakaramadougou', 16),
(73, 'Odienné', 19),
(74, 'Ouaninou', 33),
(75, 'Ouangolodougou', 29),
(76, 'Oumé', 11),
(77, 'Prikro', 17),
(78, 'Sandégué', 12),
(79, 'San-Pédro', 27),
(80, 'Sakassou', 9),
(81, 'Sassandra', 10),
(82, 'Samatiguila', 19),
(83, 'Séguéla', 31),
(84, 'Séguélon', 19),
(85, 'Sinfra', 21),
(86, 'Sikensi', 2),
(87, 'Sipilou', 30),
(88, 'Soubré', 24),
(89, 'Taabo', 2),
(90, 'Tabou', 27),
(91, 'Tai', 7),
(92, 'Tanda', 12),
(93, 'Tehini', 6),
(94, 'Tengréla', 3),
(95, 'Tiapoum', 28),
(96, 'Tiassalé', 2),
(97, 'Tiébissou', 4),
(98, 'Touba', 33),
(99, 'Transua', 12),
(100, 'Toumodi', 4),
(101, 'Toulepleu', 7),
(102, 'Vavoua', 15),
(103, 'Yakassé-Attobrou', 22),
(104, 'Yamoussoukro', 32),
(105, 'Zoukeugbeu', 15),
(106, 'Zouhan-Hounien', 30),
(107, 'Zuénoula', 21);

INSERT INTO `piupiu_communes` (`id`, `name`, `idDepartments`) VALUES
(1, 'Abengourou', 1),
(2, 'Niable', 1),
(3, 'Abobo', 3),
(4, 'Adjamé', 3),
(5, 'Anyama', 3),
(6, 'Attécoubé', 3),
(7, 'Bingerville', 3),
(8, 'Cocody', 3),
(9, 'Koumassi', 3),
(10, 'Marcory', 3),
(11, 'Plateau', 3),
(12, 'Port-bouët', 3),
(13, 'Songon', 3),
(14, 'Treichville', 3),
(15, 'Yopougon', 3),
(16, 'Agnibilékrou', 4),
(17, 'Aboisso', 5),
(18, 'Ayamé', 5),
(19, 'Maféré', 5),
(20, 'Adiaké', 6),
(21, 'Adzopé', 7),
(22, 'Agou', 7),
(23, 'Afféry', 8),
(24, 'Akoupé', 8),
(25, 'Alépé', 9),
(26, 'Agboville', 10),
(27, 'Azaguié', 10),
(28, 'Rubino', 10),
(29, 'Sikensi', 10),
(30, 'Taabo', 10),
(31, 'Tiassalé', 10),
(32, 'Anoumaba', 11),
(33, 'Arrah', 11),
(34, 'Béoumi', 13),
(35, 'Bodokro', 13),
(36, 'Béttié', 14),
(37, 'Biankouman', 15),
(38, 'Bongouanou', 18),
(39, 'Brobo', 19),
(40, 'Botro', 19),
(41, 'Buyo', 20),
(42, 'Mayo', 20),
(43, 'Bouaflé', 21),
(44, 'Bouaké', 22),
(45, 'Diabo', 22),
(46, 'Bouna', 23),
(47, 'N’Djébonouan', 22),
(48, 'Doropo', 23),
(49, 'Nassian', 23),
(50, 'Tehini', 23),
(51, 'Bondoukou', 24),
(52, 'Kouassi Datékro', 24),
(53, 'Dabou', 27),
(54, 'Danane', 28),
(55, 'Bédiala', 29),
(56, 'Daloa', 29),
(57, 'Dianra', 31),
(58, 'Didiévi', 32),
(59, 'Tié-N’diekro', 32),
(60, 'Djékanou', 36),
(61, 'Tiébissou', 36),
(62, 'Fresco', 41),
(63, 'BonouaTiapoum', 44),
(64, 'Grand Bassam', 44),
(65, 'Grand Lahou', 45),
(66, 'Gueyo', 47),
(67, 'Bloléquin', 48),
(68, 'Guiglo', 48),
(69, 'Taï', 48),
(70, 'Toulepleu', 48),
(71, 'Issia', 50),
(72, 'Gboguhé', 50),
(73, 'Saioua', 50),
(74, 'Jacqueville', 51),
(75, 'Kaniasso', 53),
(76, 'M’bengue', 56),
(77, 'Napie', 56),
(78, 'Karakoro', 56),
(79, 'Korhogo', 56),
(80, 'Sinematiali', 56),
(81, 'Sirasso', 56),
(82, 'Kounahiri', 59),
(83, 'Koun-fao', 60),
(84, 'Madinani', 64),
(85, 'Bin Houyé', 65),
(86, 'Logoualé', 65),
(87, 'Gbonné', 65),
(88, 'Man', 65),
(89, 'Sanguiné', 65),
(90, 'Kongasso', 66),
(91, 'Mankono', 66),
(92, 'Tiénigoué', 66),
(93, 'Sarhala', 66),
(94, 'Mbatto', 68),
(95, 'Tiémélékro', 68),
(96, 'Grand-Zattry', 69),
(97, 'Méagui', 69),
(98, 'Minignan', 70),
(99, 'Bako', 73),
(100, 'Dioulatiedougou', 73),
(101, 'Odienné', 73),
(102, 'Sandégué', 78),
(103, 'Grabo', 79),
(104, 'Grand Béréby', 79),
(105, 'San Pedro', 79),
(106, 'Sakassou', 80),
(107, 'Sassandra', 81),
(108, 'Samatiguila', 82),
(109, 'Tiémé', 82),
(110, 'Séguélon', 84),
(111, 'Seydougou', 84),
(112, 'Sinfra', 85),
(113, 'Sipilou', 87),
(114, 'Soubré', 88),
(115, 'Tabou', 90),
(116, 'Tanda', 92),
(117, 'Booko', 98),
(118, 'Borotou', 98),
(119, 'Guinteguela', 98),
(120, 'Koonan', 98),
(121, 'Koro', 98),
(122, 'Ouaninou', 98),
(123, 'Touba', 98),
(124, 'Assuefry', 99),
(125, 'Transua', 99),
(126, 'Kokumbo', 100),
(127, 'Toumodi', 100),
(128, 'Vavoua', 102),
(129, 'Zoukougbeu', 102),
(130, 'Yakassé-Attobrou', 103),
(131, 'Yamoussoukro', 104),
(132, 'Zouhan Hounien', 106),
(133, 'Zuénoula', 107);

INSERT INTO `piupiu_users` (`id`, `lastName`, `firstName`, `phoneNumber`, `email`, `password`, `idCommunes`) VALUES
(8, 'Bamba', 'ibrahima', 0, 'test@mail.fr', 'azerty', 1),
(9, 'Bamba', 'ibrahima', 0, 'b.wrandy27@gmail.com', 'simplicite', 1),
(15, 'Camara', 'Amadou', 0, 'fdgfujjh@gmail.com', '$2y$10$fYEzpIARtNIWZkCarpuS6eJiJyf2IL/5PLXRN/cQkKD4r4g.6XEXy', 1),
(17, 'Bamba', 'Ibrahima', 0, 'bdtgft@gmail.com', '$2y$10$evP0Pz.34lTGYH5moZfkkOz9V0ieKpSw.igIvcNBk2MOo2QNfr9tC', 18),
(18, 'Badin', 'Johanne', 0, 'johanne@badin.fr', '$2y$10$BgqXnqF.oIrDMaemZENvfuOJMYQvhb6jA0WCZXkKrOOKU8ffHoY5.', 1),
(19, 'Schuvey', 'clement', 0, 'azerty@yahoo.fr', '$2y$10$h9.CAGBzbIwSl9o3yhCEjeEUDlQR8lpIAx78pmtvjdfpAeAbBE6LO', 1),
(20, 'Szymanski', 'thomas', 0, 'thomas.szymanski15@gmail.com', '$2y$10$iZNQbnWb/Dzi3mOWZvAQSu0Xv5zGUwrhx4bgpKPXfOkjOGy7udaNa', 12),
(21, 'Transporteur', 'Test', 0, 'transporteur@test.fr', '$2y$10$VH1vK9ztwB7G.xxGYoSKTeaHLSILtN50hOAx/MZHQLh6byft0SqLe', 12),
(22, 'Risa', 'YAMADA', 0, 'ryamada@mail.fr', '$2y$10$35Z7Kwn2smBt4/L7z22NTeXJplEwAxXFMp9DV/IAMuzmI7UJhsE9e', 14),
(23, 'Mickael', 'Noel', 0, 'mnoel.formation@novei.fr', '$2y$10$t2kCwvoE2Pqgre0bEobi/u1FQ/fnseXFvBzPjBczeAzUR7Cy9Yoje', 22);

INSERT INTO `piupiu_exploitations` (`id`, `name`, `phoneNumber`, `idCommunes`, `idUsers`) VALUES
(1, 'ferme chloéland', 0, 1, 8),
(2, 'MaxveganBio', 0, 4, 9),
(3, 'thomasBio', 0, 3, 15),
(4, 'tarekferme', 0, 9, 17),
(5, 'camara100%Bio', 0, 10, 18);

INSERT INTO `piupiu_hauliers` (`id`, `name`, `phoneNumber`, `idUsers`) VALUES
(2, 'johanna', '0689305321', 18),
(3, 'ibrahima', '0102030104', 8),
(4, 'maxime', '0302010504', 9),
(5, 'chloé', '0603020103', 17),
(6, 'thomas', '0205060708', 18);

INSERT INTO `piupiu_productCategories` (`id`, `name`) VALUES
(1, 'Viande'),
(2, 'Maraîcher'),
(3, 'Céréale');


INSERT INTO `piupiu_productTypes` (`id`, `name`, `idProductCategories`) VALUES
(1, 'Avicole', 1),
(2, 'Légumes', 2),
(3, 'Maïs', 3);

INSERT INTO `piupiu_productDetails` (`id`, `name`, `imageLink`, `publicationDate`, `idProductTypes`) VALUES
(1, 'aubergine', '', '2018-03-01 00:00:00', 1),
(2, 'maïs', '', '2018-03-02 00:00:00', 3),
(3, 'poulet', '', '2018-03-13 00:00:00', 2),
(4, 'aubergine', '', '2018-03-01 00:00:00', 1),
(5, 'gombo', '', '2018-03-02 07:35:11', 3),
(6, 'canard', '', '2018-03-08 14:30:17', 1),
(7, 'tomate', '', '2018-03-05 04:27:09', 1),
(8, 'pintade', '', '2018-03-09 05:16:10', 1),
(9, 'mangue', '', '2018-03-10 12:12:23', 3),
(10, 'orange', '', '2018-03-03 12:14:04', 1);


INSERT INTO `piupiu_proposals` (`id`, `idExploitations`, `idProductDetails`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

INSERT INTO `piupiu_trucks` (`id`, `name`, `volume`, `idHauliers`, `idCommunes`) VALUES
(1, 'renault kangoo', '650 kg', 2, 1),
(2, 'ford connect', '850 kg', 3, 1),
(3, 'mercedes atego', '3.5 tonnes', 4, 1),
(4, 'Daf LF 45', '6.6 tonnes', 5, 1),
(5, 'isuzu n35pr', '35 tonnes', 6, 1);

INSERT INTO `piupiu_wholesalePrices` (`id`, `price`, `startDate`, `idProductDetails`, `idCommunes`) VALUES
(1, '500 FCFA', '2018-03-01', 2, 1),
(2, '750 FCFA', '2018-03-03', 3, 3),
(3, '1000 FCFA', '2018-03-09', 1, 4),
(4, '500 FCFA', '2018-03-08', 1, 10),
(5, '350 FCFA', '2018-03-02', 2, 25);
