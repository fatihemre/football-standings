-- -------------------------------------------------------------
-- TablePlus 4.8.3(439)
--
-- https://tableplus.com/
--
-- Database: football
-- Generation Time: 2022-08-18 21:57:27.2040
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `goals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `match_id` int NOT NULL,
  `team_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `match_goal_fk` (`match_id`),
  KEY `team_goal_fk` (`team_id`),
  CONSTRAINT `match_goal_fk` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`),
  CONSTRAINT `team_goal_fk` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

INSERT INTO `goals` (`id`, `match_id`, `team_id`) VALUES
(1, 172, 18),
(2, 172, 18),
(3, 173, 17),
(4, 173, 9),
(5, 174, 6),
(6, 176, 10),
(7, 176, 10),
(8, 176, 1),
(9, 176, 1),
(10, 176, 1),
(11, 175, 13),
(12, 175, 13),
(13, 175, 2),
(14, 175, 2),
(15, 175, 2),
(16, 175, 2),
(17, 177, 8),
(18, 178, 5),
(19, 178, 5),
(20, 178, 5),
(21, 178, 5),
(22, 180, 7),
(23, 180, 7),
(24, 180, 7),
(25, 180, 19),
(26, 180, 19),
(27, 180, 19),
(28, 181, 18),
(29, 182, 15),
(30, 184, 1),
(31, 184, 1),
(32, 184, 1),
(33, 183, 10),
(34, 186, 9),
(35, 185, 4),
(36, 187, 2),
(37, 187, 2),
(38, 187, 2),
(39, 187, 6),
(40, 187, 6),
(41, 187, 6),
(42, 189, 7),
(43, 189, 7),
(44, 189, 7),
(45, 189, 7),
(46, 189, 7),
(47, 189, 7);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;