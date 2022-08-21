-- -------------------------------------------------------------
-- TablePlus 4.8.3(439)
--
-- https://tableplus.com/
--
-- Database: football
-- Generation Time: 2022-08-21 18:44:56.7740
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `standings` AS select `t`.`id` AS `team_id`,`t`.`display_name` AS `display_name`,`t`.`short_code` AS `short_code`,((select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) and (`rw`.`home_points` = 3))) + (select count(0) from `results_view` `rw` where ((`rw`.`away_team_id` = `t`.`id`) and (`rw`.`away_points` = 3)))) AS `win`,((select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) and (`rw`.`home_points` = 1))) + (select count(0) from `results_view` `rw` where ((`rw`.`away_team_id` = `t`.`id`) and (`rw`.`away_points` = 1)))) AS `draw`,((select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) and (`rw`.`home_points` = 0))) + (select count(0) from `results_view` `rw` where ((`rw`.`away_team_id` = `t`.`id`) and (`rw`.`away_points` = 0)))) AS `lose`,(select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) or (`rw`.`away_team_id` = `t`.`id`))) AS `played`,((select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) AS `goal_scored`,((select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) AS `goal_conceded`,(((select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) - ((select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`)))) AS `goal_difference`,((select ifnull(sum(`rw`.`home_points`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`away_points`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) AS `points` from `teams` `t` order by ((select ifnull(sum(`rw`.`home_points`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`away_points`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) desc,(((select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) - ((select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`)))) desc,((select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) desc,((select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`)) + (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))) desc,`t`.`display_name`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;