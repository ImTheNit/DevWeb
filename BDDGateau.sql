-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/#/d/BW562l
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.


CREATE TABLE `Gateau` (
    `nom` string  NOT NULL ,
    `quantitéDispo` int  NOT NULL ,
    `commandable` boolean  NOT NULL ,
    `prix` double  NOT NULL ,
    PRIMARY KEY (
        `nom`
    )
);

CREATE TABLE `commande` (
    `numero` int  NOT NULL ,
    `id` client  NOT NULL ,
    PRIMARY KEY (
        `numero`
    )
);

CREATE TABLE `client` (
    `id` int  NOT NULL ,
    `prénom` string  NOT NULL ,
    `nom` string  NOT NULL ,
    `adresse` string  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `ligne` (
    `nomgateau` string  NOT NULL ,
    `idcommande` int  NOT NULL ,
    `quantite` int  NOT NULL ,
    PRIMARY KEY (
        `nomgateau`,`idcommande`
    )
);

ALTER TABLE `commande` ADD CONSTRAINT `fk_commande_id` FOREIGN KEY(`id`)
REFERENCES `client` (`id`);

ALTER TABLE `ligne` ADD CONSTRAINT `fk_ligne_nomgateau` FOREIGN KEY(`nomgateau`)
REFERENCES `Gateau` (`nom`);

ALTER TABLE `ligne` ADD CONSTRAINT `fk_ligne_idcommande` FOREIGN KEY(`idcommande`)
REFERENCES `commande` (`numero`);

