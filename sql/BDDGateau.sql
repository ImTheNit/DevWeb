

Create DATABASE IF NOT EXISTS PalaisDesGateaux;

CREATE TABLE IF NOT EXISTS Gateau(
  idGateau INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(20) NOT NULL,
  Goût VARCHAR(15) NULL,
  PRIMARY KEY (idGateau)
 );

CREATE TABLE IF NOT EXISTS Allergenes (
  Nom VARCHAR(20) NOT NULL,
  PRIMARY KEY (Nom));


CREATE TABLE IF NOT EXISTS Client (
  idClient INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(20) NOT NULL,
  Prenom VARCHAR(20) NOT NULL,
  mdp VARCHAR(45) NOT NULL,
  email VARCHAR(50) NULL,
  PRIMARY KEY (idClient),
  FOREIGN KEY fk_id_commande_adresse_default(idcad) REFERENCES Commande(NumeroCommande));
  

CREATE TABLE IF NOT EXISTS Commande (
  NumeroCommande INT NOT NULL AUTO_INCREMENT,
  NumeroRue INT NOT NULL,
  NomRue VARCHAR(45) NOT NULL,
  NomVille VARCHAR(45) NOT NULL,
  CodePostal INT NOT NULL,
  PRIMARY KEY (NuméroCommande));
  
CREATE TABLE IF NOT EXISTS LienAllergene (
  FOREIGN KEY fk_allergene(NomAllergene) REFERENCES Allergenes(Nom),
  FOREIGN KEY fk_gateau_nom(NomGateau) REFERENCES Gateau(Nom),
  FOREIGN KEY fk_gateau_gout(GoutGateau) REFERENCES Gateau(Gout)
  );

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