

Create DATABASE IF NOT EXISTS PalaisDesGateaux;



CREATE TABLE IF NOT EXISTS Client (
  idClient INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(20) NOT NULL,
  Prenom VARCHAR(20) NOT NULL,
  mdp VARCHAR(45) NOT NULL,
  email VARCHAR(50) NULL,
  NumeroRue INT NOT NULL,
  NomRue VARCHAR(45) NOT NULL,
  NomVille VARCHAR(45) NOT NULL,
  CodePostal INT NOT NULL,
  PRIMARY KEY (idClient)
  );
  

CREATE TABLE IF NOT EXISTS Commande (
  NumeroCommande INT NOT NULL AUTO_INCREMENT,
  NumeroRue INT NOT NULL,
  NomRue VARCHAR(45) NOT NULL,
  NomVille VARCHAR(45) NOT NULL,
  CodePostal INT NOT NULL,
  idclient INT NOT NULL,
  prix FLOAT,
  jour DATE DEFAULT (CURRENT_DATE()),
  PRIMARY KEY (NumeroCommande),
  FOREIGN KEY fk_id_client(idclient) REFERENCES Client(idClient)
  );
  


