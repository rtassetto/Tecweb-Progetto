CREATE TABLE Account(
    username varchar(20) PRIMARY KEY,
    password varchar(20),
    email varchar(50) UNIQUE,
    admin boolean,
    datacreazione datetime
)

CREATE TABLE Prodotto(
  	id int PRIMARY KEY,
    nome varchar(150),
    categoria enum ('Monitor','HDD','SSD'),
    descrizione varchar(2000),
    Valutazione int,
    prezzo float
)

CREATE TABLE PurchaseHistory(
	idordine int PRIMARY KEY,
	compratore varchar(20) REFERENCES username(Account),
	prodotto int REFERENCES id(Prodotto),
	data datetime,
	quantita int
)

CREATE TABLE Carrello(
	username varchar(20) REFERENCES username(Account),
	prodotto int REFERENCES id(Prodotto),
	quantita int,
    PRIMARY KEY (username,prodotto)
)

CREATE TABLE Recensione(
	username varchar(20) REFERENCES username(Account),
	prodotto int REFERENCES id(Prodotto),
	review varchar(1000),
	voto int,
	data datetime
)

CREATE TABLE Bundles(
	nome varchar(25),
	descrizione varchar(300),
	data datetime,
    PRIMARY KEY(nome, data)
)

CREATE TABLE Bundleparts(
	bundle varchar(25) REFERENCES nome(Bundles),
	pezzo int REFERENCES id(Prodotto),
    PRIMARY KEY(bundle, pezzo)
)
;