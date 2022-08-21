-- -------------------------------------------------------------
-- TablePlus 4.8.3(439)
--
-- https://tableplus.com/
--
-- Database: football
-- Generation Time: 2022-08-21 18:44:41.2830
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `results_view` AS select `result`.`id` AS `match_id`,`result`.`fixture_id` AS `fixture_id`,`result`.`home_team_id` AS `home_team_id`,`result`.`home_score` AS `home_score`,(case when (`result`.`home_score` > `result`.`away_score`) then 3 when (`result`.`away_score` > `result`.`home_score`) then 0 else 1 end) AS `home_points`,`result`.`away_team_id` AS `away_team_id`,`result`.`away_score` AS `away_score`,(case when (`result`.`away_score` > `result`.`home_score`) then 3 when (`result`.`home_score` > `result`.`away_score`) then 0 else 1 end) AS `away_points` from (select `m`.`id` AS `id`,`m`.`fixture_id` AS `fixture_id`,`m`.`home_team_id` AS `home_team_id`,(select count(0) from `goals` where ((`goals`.`match_id` = `m`.`id`) and (`goals`.`team_id` = `m`.`home_team_id`))) AS `home_score`,`m`.`away_team_id` AS `away_team_id`,(select count(0) from `goals` where ((`goals`.`match_id` = `m`.`id`) and (`goals`.`team_id` = `m`.`away_team_id`))) AS `away_score` from `matches` `m` where (`m`.`match_day` < now())) `result`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;