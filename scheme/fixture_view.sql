-- -------------------------------------------------------------
-- TablePlus 4.8.3(439)
--
-- https://tableplus.com/
--
-- Database: football
-- Generation Time: 2022-08-21 18:44:27.8440
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fixture_view` AS select `m`.`id` AS `id`,`m`.`fixture_id` AS `fixture_id`,`m`.`week` AS `week`,`home_team`.`display_name` AS `home_team_name`,`home_team`.`short_code` AS `home_team_short_code`,`home_team`.`id` AS `home_team_id`,(select count(0) from `goals` `g` where ((`g`.`match_id` = `m`.`id`) and (`g`.`team_id` = `m`.`home_team_id`))) AS `home_team_score`,`away_team`.`display_name` AS `away_team_name`,`away_team`.`short_code` AS `away_team_short_code`,`away_team`.`id` AS `away_team_id`,(select count(0) from `goals` `g` where ((`g`.`match_id` = `m`.`id`) and (`g`.`team_id` = `m`.`away_team_id`))) AS `away_team_score`,`m`.`match_day` AS `match_day` from ((`matches` `m` left join `teams` `home_team` on((`home_team`.`id` = `m`.`home_team_id`))) left join `teams` `away_team` on((`away_team`.`id` = `m`.`away_team_id`))) order by `m`.`match_day`,`home_team`.`display_name`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;