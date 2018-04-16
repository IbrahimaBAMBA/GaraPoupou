SELECT `piupiu_users`.`lastName`, `piupiu_users`.`firstName`, `piupiu_departments`.`nom` AS Departement, `piupiu_trucks`.`name`,`piupiu_trucks`.`volume`, `piupiu_productDetails`.`name`, `piupiu_productDetails`.`publicationDate`
FROM `piupiu_users`
LEFT JOIN piupiu_communes ON piupiu_users.idCommunes = piupiu_communes.id
LEFT JOIN piupiu_departments ON piupiu_communes.idDepartments = piupiu_departments.id
LEFT JOIN piupiu_wholesalePrices ON piupiu_communes.id = piupiu_wholesalePrices.id
LEFT JOIN piupiu_productDetails ON piupiu_wholesalePrices.id = piupiu_productDetails.id
LEFT JOIN piupiu_hauliers ON piupiu_users.id = piupiu_hauliers.idUsers
INNER JOIN piupiu_trucks ON piupiu_hauliers.id = piupiu_trucks.id
WHERE piupiu_productDetails.name = 'banane' AND piupiu_productDetails.publicationDate = '10/10/1897'


#------------------------------------------------------------

SELECT com.`nom`,pri.price, pri.startDate FROM piupiu_departments AS dep 
LEFT JOIN piupiu_communes AS com ON dep.id = com.idDepartments 
LEFT JOIN piupiu_wholesalePrices AS pri ON pri.idCommunes = com.id 
INNER JOIN piupiu_productDetails AS pro ON pro.idWholeSalePrice = pri.id 
WHERE com.nom = 'yopougon' AND pro.name = 'aubergine' AND pro.publicationDate = '10/10/2000' 

#------------------------------------------------------------

-- Requête profil utilisateur
SELECT `piupiu_users`.`lastName`, `piupiu_users`.`firstName`, `piupiu_users`.`phoneNumber`, `piupiu_users`.`email`,
`piupiu_exploitations`.`name` AS `location`, `piupiu_hauliers`.`name`, `piupiu_trucks`.`name` AS `carBrand`, `piupiu_trucks`.`volume` AS `carCapacity`, `piupiu_communes`.`name` AS `communeName`
FROM `piupiu_users`
INNER JOIN `piupiu_exploitations` ON `piupiu_users`.`id` = `piupiu_exploitations`.`idUsers`
INNER JOIN `piupiu_communes` ON `piupiu_exploitations`.`id` = `piupiu_communes`.`id`
INNER JOIN `piupiu_hauliers` ON `piupiu_users`.`id` = `piupiu_hauliers`.`idUsers`
INNER JOIN `piupiu_trucks` ON `piupiu_hauliers`.`id` = `piupiu_trucks`.`idHauliers`
WHERE `piupiu_users`.`id` = :id

#------------------------------------------------------------


-- Requête profil utilisateur cibléee, avec une 'correspondance' l'idCommunes de la table piupiu_users = au nom de la table piupiu_communes
SELECT `piupiu_users`.`lastName`, `piupiu_users`.`firstName`, `piupiu_users`.`phoneNumber` `piupiu_users`.`email`, `piupiu_users`.`idCommunes`, `piupiu_communes`.`name`
FROM `piupiu_users` 
INNER JOIN `piupiu_communes` ON `piupiu_users`.`idCommunes` = `piupiu_communes`.`id`
WHERE `piupiu_users`.`id` = :id

#------------------------------------------------------------

-- Nouvelle requête avec une sous requête
SELECT `piupiu_users`.`lastName`, `piupiu_users`.`firstName`, `piupiu_users`.`phoneNumber`, `piupiu_users`.`email`, `piupiu_exploitations`.`name` AS `exploitationName`, 
`piupiu_trucks`.`name` AS `carBrand`, 
`piupiu_trucks`.`volume` AS `carCapacity`, 
`piupiu_communes`.`name` AS `communeName` 
FROM `piupiu_users` 
INNER JOIN `piupiu_exploitations` ON `piupiu_users`.`id` = `piupiu_exploitations`.`idUsers` 
INNER JOIN `piupiu_communes` ON `piupiu_exploitations`.`id` = `piupiu_communes`.`id` 
INNER JOIN `piupiu_hauliers` ON `piupiu_users`.`id` = `piupiu_hauliers`.`idUsers` 
INNER JOIN `piupiu_trucks` ON `piupiu_hauliers`.`id` = `piupiu_trucks`.`idHauliers` 
WHERE `piupiu_users`.`id` = 1 
= (SELECT `name` FROM `piupiu_communes` WHERE `piupiu_communes`.`id` = `piupiu_users`.`idCommunes`)

#------------------------------------------------------------

-- Requete pour afficher mes produits par regions, departement,commune,exploitation,et produit
SELECT `prop`.`id` AS `proposalId`, `prod`.`name` AS `productName`, `com`.`nom` AS `communeName`, `exp`.`name` AS `exploitationName`, `prod`.`publicationDate` 
FROM `piupiu_productDetails` AS `prod` 
INNER JOIN `piupiu_proposals` AS `prop` ON `prop`.`idProductDetails` = `prod`.`id` 
INNER JOIN `piupiu_exploitations` AS `exp` 
ON `prop`.`idExploitations` = `exp`.`id` 
INNER JOIN `piupiu_communes` AS `com` 
ON `exp`.`idCommunes` = `com`.`id` 
INNER JOIN `piupiu_departments` AS `dep` 
ON `com`.`idDepartments` = `dep`.`id` 
INNER JOIN `piupiu_regions` AS `reg` 
ON `dep`.`idRegions` = `reg`.`id` 
WHERE `reg`.`id` = :id;

#------------------------------------------------------------

-- Nouvelle requete pour l'affichage des cours
SELECT `com`.`nom`, `who`.`price`, `who`.`startDate`, `prod`.`name`, `prod`.`publicationDate` 
FROM `piupiu_productDetails` AS `prod` 
INNER JOIN `piupiu_wholesalePrices` AS `who` ON `who`.`idProductDetails` = `prod`.`id` 
INNER JOIN `piupiu_communes` AS `com` ON `com`.`idDepartments` = `who`.`id` 
INNER JOIN `piupiu_departments` AS `dep` ON `dep`.`idRegions` = `com`.`id` 
WHERE `who`.`id` = 1 

