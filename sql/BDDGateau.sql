

Create DATABASE IF NOT EXISTS `PalaisDesGateaux`;

CREATE TABLE IF NOT EXISTS `Gateau` (
  `idGateau` INT NOT NULL,
  `Nom` VARCHAR(20) NOT NULL,
  `Goût` VARCHAR(15) NULL,
  PRIMARY KEY (`idGateau`)
 )

CREATE TABLE IF NOT EXISTS `Allergènes` (
  `NomAllegène` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`NomAllegène`)
  )


CREATE TABLE IF NOT EXISTS `Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(20) NOT NULL,
  `Prénom` VARCHAR(20) NOT NULL,
  `Numéro rue` INT NOT NULL,
  `Nom rue` VARCHAR(45) NOT NULL,
  `Nom ville` VARCHAR(45) NOT NULL,
  `Code postal` INT NOT NULL,
  `mot de passe encrypté` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NULL,
  PRIMARY KEY (`idClient`)
  )

CREATE TABLE IF NOT EXISTS `Commande` (
  `NuméroCommande` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NuméroCommande`)
)

INSERT INTO gateau VALUES (0,"gateauPhoto","Fraisier");
INSERT INTO gateau VALUES (1,"gateauPhoto","Framboisier");
INSERT INTO gateau VALUES (2,"gateauPhoto","Charlotte");
INSERT INTO gateau VALUES (3,"gateauPhoto","Framboisine");
INSERT INTO gateau VALUES (4,"gateauPhoto","Craqueline");

INSERT INTO gateau VALUES (5,"GateauPhoto","Fraisier");

INSERT INTO gateau VALUES (6,"piecesmontees","MonteCarlo");
INSERT INTO gateau VALUES (7,"piecesmontees","TuttiFrutti");
INSERT INTO gateau VALUES (8,"piecesmontees","Rougepassion");
INSERT INTO gateau VALUES (9,"piecesmontees","Versailles");
INSERT INTO gateau VALUES (10,"piecesmontees","Seville");
INSERT INTO gateau VALUES (11,"piecesmontees","Seville");

INSERT INTO gateau VALUES (12,"charlottes","Framboise");
INSERT INTO gateau VALUES (13,"charlottes","Lambada");
INSERT INTO gateau VALUES (14,"charlottes","PoireChocolat");
INSERT INTO gateau VALUES (15,"charlottes","Chocolat");
INSERT INTO gateau VALUES (16,"charlottes","Chocolat");
INSERT INTO gateau VALUES (17,"charlottes","Fraise");