-- -------------------------------------------------------------
-- TablePlus 4.8.3(439)
--
-- https://tableplus.com/
--
-- Database: football
-- Generation Time: 2022-08-18 21:58:04.4730
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `teams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `short_code` varchar(3) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO `teams` (`id`, `short_code`, `display_name`) VALUES
(1, 'ADS', 'Adana Demirspor'),
(2, 'ALN', 'Alanyaspor'),
(3, 'AKG', 'Ankaragücü'),
(4, 'ANT', 'Antalyaspor'),
(5, 'BSK', 'Başakşehir'),
(6, 'BJK', 'Beşiktaş'),
(7, 'FB', 'Fenerbahçe'),
(8, 'GS', 'Galatasaray'),
(9, 'GFK', 'Gaziantep FK'),
(10, 'GRS', 'Giresunspor'),
(11, 'HTY', 'Hatayspor'),
(12, 'IST', 'İstanbulspor'),
(13, 'KGR', 'Karagümrük'),
(14, 'KSP', 'Kasımpaşa'),
(15, 'KS', 'Kayserispor'),
(16, 'KON', 'Konyaspor'),
(17, 'SVS', 'Sivasspor'),
(18, 'TS', 'Trabzonspor'),
(19, 'ÜMR', 'Ümraniyespor');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;