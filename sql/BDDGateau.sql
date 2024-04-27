
DROP DATABASE PalaisDesGateaux;
Create DATABASE IF NOT EXISTS PalaisDesGateaux;



CREATE TABLE IF NOT EXISTS Client (
  idClient INT NOT NULL AUTO_INCREMENT,
  Nom VARCHAR(20) NOT NULL,
  Prenom VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL,
  mdp VARCHAR(200) NOT NULL, -- Augmenter la taille du champ car la fonction password_hash() dans php retourne un chaine plus longue
  Numero INT ,
  TypeVoie VARCHAR(45),
  NomVoie VARCHAR(45),
  NomVille VARCHAR(45),
  CodePostal INT,
  PRIMARY KEY (idClient)
  );
  

CREATE TABLE IF NOT EXISTS Commande (
  NumeroCommande INT NOT NULL AUTO_INCREMENT,
  Numero INT,
  TypeVoie VARCHAR(45),
  NomVoie VARCHAR(45),
  NomVille VARCHAR(45),
  CodePostal INT,
  idclient INT NOT NULL,
  prix FLOAT,
  jour DATE DEFAULT (CURRENT_DATE()),
  PRIMARY KEY (NumeroCommande),
  FOREIGN KEY fk_id_client(idclient) REFERENCES Client(idClient)
  );
  


