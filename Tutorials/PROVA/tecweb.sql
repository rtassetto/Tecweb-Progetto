-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Dic 12, 2017 alle 00:06
-- Versione del server: 5.7.11
-- Versione PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecweb`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `personaggi`
--

CREATE TABLE `personaggi` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Specializzazione` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `QI` int(11) DEFAULT NULL,
  `FileImmagine` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Descrizione` text CHARACTER SET latin1 NOT NULL,
  `PrimaStagione` tinyint(1) NOT NULL DEFAULT '1',
  `SecondaStagione` tinyint(1) NOT NULL DEFAULT '1',
  `TerzaStagione` tinyint(1) NOT NULL DEFAULT '1',
  `QuartaStagione` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `personaggi`
--

INSERT INTO `personaggi` (`ID`, `Nome`, `Specializzazione`, `QI`, `FileImmagine`, `Descrizione`, `PrimaStagione`, `SecondaStagione`, `TerzaStagione`, `QuartaStagione`) VALUES
(1, 'Leonard Hofstadter', 'Fisica', 173, 'leonard_hofstadter.jpg', 'Leonard, originario del New Jersey, è un fisico laureato a Princeton che lavora come fisico sperimentale al Caltech. Oltre al suo campo di studi, si interessa anche alla letteratura fantasy e alla storia. Vive con il suo coinquilino Sheldon nell\'appartamento 4A al 2311 North Los Robles Avenue di Pasadena e ha come vicina Penny (che vive al 4B); proprio come per il suo coinquilino, anche lui porta il cognome di uno dei vincitori del Nobel per la fisica, Robert Hofstadter, mentre il nome è tratto direttamente dall\'attore, regista e produttore cinematografico Sheldon Leonard. Il suo QI è di ben 173, ma Sheldon ama sminuire le capacità e il lavoro di Leonard: in particolare, continua a sostenere che tutte le sue ricerche sarebbero copiate, al punto che le sue teorie potrebbero essere scritte "su qualunque bagno maschile al MIT".', 1, 1, 0, 1),
(2, 'Sheldon Cooper', 'Fisica', 187, 'dr_sheldon_cooper.jpg', 'Sheldon, soprannominato "Shelly" dalla madre e dalla sorella, è nato a Galveston, in Texas, il 26 febbraio 1980 in un supermercato. È stato un bambino prodigio, come testimoniato dal suo quoziente d\'intelligenza (187, di molto superiore alla norma) e dalla sua rapida carriera scolastica: si è diplomato all\'eta di 11 anni approdando alla stessa età alla formazione universitaria e all\'età di 16 anni ha ottenuto il suo primo dottorato di ricerca. All\'inizio della serie e per gran parte di essa vive con il coinquilino Leonard nell\'appartamento 4A al 2311 North Los Robles Avenue di Pasadena, per poi trasferirsi nell\'appartamento di Penny con Amy nella decima stagione. Come più volte afferma lui stesso possiede una memoria eidetica e un orecchio assoluto. È stato educato da una madre estremamente religiosa e, in più occasioni, questo aspetto contrasta con il rigore scientifico di Sheldon; tuttavia la donna sembra essere l\'unica persona in grado di comandarlo a bacchetta.', 1, 0, 0, 1),
(3, 'Penny', 'Attrice', NULL, 'penny.jpg', 'Penny nasce a Omaha, nel Nebraska, in una famiglia disfunzionale di cui viene rivelato ben poco. Suo padre Wyatt desiderava un maschio con cui giocare a baseball e quindi tenta di crescerla come un ragazzo; in un episodio la ragazza menziona il fatto di avere una sorella sposata che ha sparato al marito in stato di ebbrezza: questi, sopravvissuto, ha dato un figlio alla donna rendendo quindi Penny zia. Rivela inoltre di avere un fratello imprigionato per "chimica clandestina" (probabile eufemismo per dire produzione di stupefacenti) e uscito su condizionale, cosa che viene confermata quando Penny afferma che il fratello produceva anfetamina. Della sua travagliata giovinezza si sa che da bambina ha aggiustato il motore di un trattore, che ha partecipato a un junior rodeo e che è stata reginetta del granturco a 16 anni, stessa età a cui ha rischiato di diventare una ragazza madre. Essendo il Nebraska uno stato prevalentemente agricolo, nel corso della serie viene spesso ribadito il luogo di nascita di Penny per giustificarne alcuni comportamenti estremamente grezzi o sbrigativi con cui risolvere alcuni problemi della vita quotidiana.', 1, 1, 1, 0),
(4, 'Howard Wolowitz', 'Ingegneria', 155, 'howard_wolowiz.jpg', 'Howard è molto attaccato alla madre (di cui si sente solo la voce fuori campo e che non compare mai in scena, fatta eccezione per alcune fotografie di lei da giovane e parte del corpo in secondo piano mentre cammina in cucina, ma da come la descrive Howard, è una donna molto grassa e brutta) sebbene ci litighi di continuo in quanto è stato abbandonato dal padre, Sam, all\'età di undici anni. Nonostante la possibilità di andarsene di casa, ha continuato a vivere con lei, anche a causa dei continui sensi di colpa che gli faceva venire, incarnando lo stereotipo del maschio adulto ebreo. Anche una volta sposato ha continuato a dormire spesso con Bernadette nella sua cameretta, salvo finalmente traslocare definitivamente nella casa dove sua moglie viveva da sola, per poi trasferirsi di nuovo nella sua casa natale dopo la morte della madre. Ha perso la verginità con la sua cugina di secondo grado Jeanie, la quale è apparsa in un episodio dell\'ottava stagione della serie.', 0, 0, 0, 1),
(5, 'Raj Koothrappali', 'Astrofisico', 147, 'raj.jpg', 'Raj è un astrofisico indiano, nato il 6 ottobre, ha studiato a Cambridge, e lavora presso il Dipartimento di fisica del Caltech, dove ha ottenuto un riconoscimento per una sua pubblicazione sulla fascia di Kuiper. È il miglior amico di Howard Wolowitz. Inizialmente la sua caratteristica principale era il mutismo selettivo che gli impediva di parlare con le donne (come Penny), questo infatti lo spingeva a parlare all\'orecchio di Howard per far sì che l\'amico intermediasse per lui, in altre occasioni, invece cercava di arginare l\'ostacolo sotto l\'effetto di alcolici o di farmaci sperimentali, ma nel finale della sesta stagione il problema viene superato in seguito ad una delusione d\'amore. Talvolta imbastisce, inconsapevolmente, battute con doppi sensi involontari omosessuali che più d\'una volta stupiscono (negativamente) i presenti.', 1, 0, 1, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `personaggi`
--
ALTER TABLE `personaggi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `personaggi`
--
ALTER TABLE `personaggi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
