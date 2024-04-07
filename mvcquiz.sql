-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6786
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mvcquiz
CREATE DATABASE IF NOT EXISTS `mvcquiz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `mvcquiz`;

-- Dumping structure for table mvcquiz.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `answers` text NOT NULL,
  `correct_answer` text NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_question_quiz` (`quiz_id`),
  CONSTRAINT `FK_question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table mvcquiz.question: ~29 rows (approximately)
DELETE FROM `question`;
INSERT INTO `question` (`id`, `question`, `answers`, `correct_answer`, `quiz_id`) VALUES
	(1, 'Koji znak označava početak PHP skripte?', '{"a":"<?","b":"<?php","c":"<?=","d":"<?="}', 'b', 1),
	(2, 'Kako završava naredba u PHP-u?', '{"a":".","b":";","c":":","d":","}', 'b', 1),
	(3, 'Kako se označava jednolinijski komentar u PHP-u?', '{"a":"\\/\\/","b":"\\/* *\\/","c":"#","d":"--"}', 'a', 1),
	(4, 'Kako se provjerava duljina niza u PHP-u?', '{"a":"len()","b":"size()","c":"length()","d":"count()"}', 'd', 1),
	(5, 'Koji operator se koristi za spajanje stringova u PHP-u?', '{"a":"&","b":".","c":"+","d":","}', 'b', 1),
	(6, 'Kako se pokreće PHP skripta iz naredbenog retka?', '{"a":"php run script.php","b":"php script.php","c":"execute script.php","d":"run script.php"}', 'b', 1),
	(7, 'Koja naredba se koristi za kreiranje baze podataka u MySQL-u?', '{"a":"MAKE DATABASE","b":"CREATE DATABASE","c":"ADD DATABASE","d":"DEFINE DATABASE"}', 'b', 2),
	(8, 'Koji tip podataka se koristi za spremanje teksta promjenjive duljine u MySQL-u?', '{"a":"FLOAT","b":"STRING","c":"VARCHAR","d":"DATE"}', 'c', 2),
	(9, 'Koja naredba se koristi za ubacivanje novog reda u tablicu u MySQL-u?', '{"a":"INSERT INTO","b":"ADD ROW","c":"ADD NEW","d":"PASTE INTO"}', 'a', 2),
	(10, 'Koja klauzula se koristi za filtriranje rezultata upita u MySQL-u?', '{"a":"WHERE","b":"FILTER","c":"SORT","d":"GROUP BY"}', 'a', 2),
	(11, 'Koja naredba se koristi za brisanje podataka iz tablice u MySQL-u?', '{"a":"REMOVE FROM","b":"DELETE FROM","c":"ERASE","d":"SCRUB TABLE"}', 'b', 2),
	(12, 'Koji operator se koristi za spajanje dva uvjeta u WHERE klauzuli u MySQL-u?', '{"a":"OR","b":"AND","c":"XOR","d":"NOT"}', 'b', 2),
	(13, 'Koja naredba se koristi za izmjenu postojećeg retka u tablici u MySQL-u?', '{"a":"CHANGE ROW","b":"MODIFY","c":"UPDATE","d":"ALTER"}', 'c', 2),
	(14, 'Koja funkcija se koristi za brojanje redaka u MySQL-u?', '{"a":"COUNT()","b":"SUM()","c":"AVERAGE()","d":"MAX()"}', 'a', 2),
	(15, 'Koja naredba se koristi za promjenu strukture tablice u MySQL-u?', '{"a":"MODIFY TABLE","b":"CHANGE TABLE","c":"UPDATE TABLE","d":"ALTER TABLE"}', 'd', 2),
	(16, 'Koji od sljedećih tipova petlji ne postoji u PHP-u?', '{"a":"for","b":"while","c":"repeat","d":"foreach"}', 'c', 1),
	(17, 'Koji operator se koristi za provjeru identičnosti po vrijednosti i tipu u PHP-u?', '{"a":"==","b":"!=","c":"===","d":"!=="}', 'c', 1),
	(18, 'Kako se pristupa vrijednosti poslane putem HTTP POST metode u PHP-u?', '{"a":"$_GET","b":"$_REQUEST","c":"$_SERVER","d":"$_POST"}', 'd', 1),
	(19, 'Koja funkcija se koristi za ispis teksta u PHP-u?', '{"a":"echo","b":"print","c":"printf","d":"println"}', 'a', 1),
	(20, 'Koja ključna riječ se koristi za definiranje klase?', '{"a":"class","b":"struct","c":"object","d":"define"}', 'a', 3),
	(21, 'Kako se definira konstruktor?', '{"a":"function __init()","b":"function __constructor()","c":"function __create()","d":"function __construct()"}', 'd', 3),
	(22, 'Koja ključna riječ se koristi za nasljeđivanje?', '{"a":"inherit","b":"extends","c":"inherit_from","d":"inherits"}', 'b', 3),
	(23, 'Kako se pristupa svojstvu objekta?', '{"a":"$object->svojstvo","b":"$object->$svojstvo","c":"$object::svojstvo","d":"$object[\'svojstvo\']"}', 'a', 3),
	(24, 'Koja metoda se automatski poziva kad se objekt uništi?', '{"a":"__destroy","b":"__delete","c":" __remove","d":"__destruct"}', 'd', 3),
	(25, 'Koji od sljedećih izraza opisuje pristupne razine svojstava i metoda koje su dostupne samo u okviru iste klase i ne mogu se pristupiti izvana?', '{"a":"Javne","b":"Privatne","c":"Za\\u0161ti\\u0107ene","d":"Naslije\\u0111ene"}', 'b', 3),
	(26, 'Koja metoda se koristi za pozivanje konstruktora roditeljske klase iz podklase?', '{"a":"parent::__init()","b":"parent::__constructor()","c":"parent::__create()","d":"parent::__construct()"}', 'd', 3),
	(27, 'Kako se provjerava pripadnost objekta određenoj klasi?', '{"a":"instanceof","b":"implements","c":"extends","d":"is_a"}', 'a', 3),
	(28, 'Koji od sljedećih izraza opisuje proces kada podklasa može redefinirati metode koje nasljeđuje od svoje roditeljske klase?', '{"a":"Enkapsulacija","b":"Polimorfizam","c":"Apstrakcija","d":"Pro\\u0161irivanje"}', 'b', 3),
	(29, 'Koja ključna riječ se koristi za definiranje apstraktne klase?', '{"a":"abstract","b":"class","c":"interface","d":"abstract_class"}', 'a', 3);

-- Dumping structure for table mvcquiz.quiz
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL DEFAULT '',
  `description` mediumtext DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table mvcquiz.quiz: ~3 rows (approximately)
DELETE FROM `quiz`;
INSERT INTO `quiz` (`id`, `title`, `description`, `image`) VALUES
	(1, 'Osnove PHP-a', 'Opis - osnove PHP-a', NULL),
	(2, 'Osnove MySQL-a', 'Opis - osnove MySQL-a', NULL),
	(3, 'Objektno orijentirano programiranje u PHP-u', 'Opis - objektno orijentirano programiranje u PHP-u', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
