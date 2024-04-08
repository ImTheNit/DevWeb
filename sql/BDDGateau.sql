

Create DATABASE IF NOT EXISTS PalaisDesGateaux;

CREATE TABLE IF NOT EXISTS Gateau(
  idGateau INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(20) NOT NULL,
  Gout VARCHAR(15) NULL,
  PRIMARY KEY (idGateau)
 );

CREATE TABLE IF NOT EXISTS Allergenes (
  Nom VARCHAR(20) NOT NULL,
  PRIMARY KEY (Nom)
  );


CREATE TABLE IF NOT EXISTS Client (
  idClient INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(20) NOT NULL,
  Prenom VARCHAR(20) NOT NULL,
  mdp VARCHAR(45) NOT NULL,
  email VARCHAR(50) NULL,
  idcad INT NOT NULL,
  PRIMARY KEY (idClient),
  FOREIGN KEY fk_id_commande_adresse_default(idcad) REFERENCES Commande(NumeroCommande)
  );
  

CREATE TABLE IF NOT EXISTS Commande (
  NumeroCommande INT NOT NULL AUTO_INCREMENT,
  NumeroRue INT NOT NULL,
  NomRue VARCHAR(45) NOT NULL,
  NomVille VARCHAR(45) NOT NULL,
  CodePostal INT NOT NULL,
  PRIMARY KEY (NumeroCommande)
  );
  
CREATE TABLE IF NOT EXISTS LienAllergene (
  NomAllergene VARCHAR(20) NOT NULL,
  NomGateau VARCHAR(20) NOT NULL,
  GoutGateau VARCHAR(15) NOT NULL,
  FOREIGN KEY fk_allergene(NomAllergene) REFERENCES Allergenes(Nom),
  FOREIGN KEY fk_gateau_nom(NomGateau) REFERENCES Gateau(Nom),
  FOREIGN KEY fk_gateau_gout(GoutGateau) REFERENCES Gateau(Gout),
  PRIMARY KEY(GoutGateau,NomGateau,NomAllergene)
  );

INSERT INTO gateau VALUES (,"gateauPhoto","Fraisier");
INSERT INTO gateau VALUES (,"gateauPhoto","Framboisier");
INSERT INTO gateau VALUES (,"gateauPhoto","Charlotte");
INSERT INTO gateau VALUES (,"gateauPhoto","Framboisine");
INSERT INTO gateau VALUES (,"gateauPhoto","Craqueline");

INSERT INTO gateau VALUES (,"GateauPhoto","Fraisier");

INSERT INTO gateau VALUES (,"piecesmontees","MonteCarlo");
INSERT INTO gateau VALUES (,"piecesmontees","TuttiFrutti");
INSERT INTO gateau VALUES (,"piecesmontees","Rougepassion");
INSERT INTO gateau VALUES ("piecesmontees","Versailles");
INSERT INTO gateau VALUES (,"piecesmontees","Seville");
INSERT INTO gateau VALUES (,"piecesmontees","Seville");

INSERT INTO gateau VALUES (,"charlottes","Framboise");
INSERT INTO gateau VALUES (,"charlottes","Lambada");
INSERT INTO gateau VALUES (,"charlottes","PoireChocolat");
INSERT INTO gateau VALUES (,"charlottes","Chocolat");
INSERT INTO gateau VALUES (,"charlottes","Chocolat");
INSERT INTO gateau VALUES (,"charlottes","Fraise");