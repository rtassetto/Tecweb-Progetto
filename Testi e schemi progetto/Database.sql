CREATE DATABASE Website;
USE Website;

CREATE TABLE Account(
    username varchar(20) PRIMARY KEY,
    password varchar(20),
    email varchar(50) UNIQUE,
    admin boolean,
    datacreazione datetime
);

CREATE TABLE Prodotto(
  	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(150),
    categoria enum ('Monitor','HDD','SSD'),
    descrizione varchar(2000),
    valutazione float,
    prezzo float
);

CREATE TABLE PurchaseHistory(
	idordine int PRIMARY KEY AUTO_INCREMENT,
	compratore varchar(20) REFERENCES username(Account),
	prodotto int REFERENCES id(Prodotto),
	data datetime,
	quantita int
);

CREATE TABLE Carrello(
	username varchar(20) REFERENCES username(Account),
	prodotto int REFERENCES id(Prodotto),
	quantita int,
    PRIMARY KEY (username,prodotto)
);

CREATE TABLE Recensione(
	username varchar(20) REFERENCES username(Account),
	prodotto int REFERENCES id(Prodotto),
	review varchar(1000),
	voto int,
	data datetime,
	PRIMARY KEY (username,prodotto)
);

CREATE TABLE Bundles(
	nome varchar(25),
	descrizione varchar(300),
	data datetime,
    PRIMARY KEY(nome)
);

CREATE TABLE BundleParts(
	bundle varchar(25) REFERENCES nome(Bundles),
	pezzo int REFERENCES id(Prodotto),
    PRIMARY KEY(bundle, pezzo)
);

CREATE TRIGGER AggiornaVoto after Insert on Recensione
for each Row
UPDATE Prodotto SET Valutazione=(SELECT avg(voto) FROM Recensione WHERE prodotto=new.prodotto) WHERE id=new.prodotto;

CREATE TRIGGER AggiornaVotoEdit after Update on Recensione
for each Row
UPDATE Prodotto SET Valutazione=(SELECT avg(voto) FROM Recensione WHERE prodotto=new.prodotto) WHERE id=new.prodotto;

CREATE TRIGGER deleteParts
AFTER DELETE ON Bundles
FOR EACH ROW
DELETE FROM  BundleParts
WHERE OLD.nome=bundle;