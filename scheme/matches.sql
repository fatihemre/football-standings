-- -------------------------------------------------------------
-- TablePlus 4.8.3(439)
--
-- https://tableplus.com/
--
-- Database: football
-- Generation Time: 2022-08-18 21:57:44.0640
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `matches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `match_day` datetime NOT NULL,
  `fixture_id` int NOT NULL,
  `week` int NOT NULL,
  `home_team_id` int DEFAULT NULL,
  `away_team_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `match_fixture_fk` (`fixture_id`),
  KEY `match_home_team_fk` (`home_team_id`),
  KEY `match_away_team_fk` (`away_team_id`),
  CONSTRAINT `match_away_team_fk` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `match_fixture_fk` FOREIGN KEY (`fixture_id`) REFERENCES `fixtures` (`id`),
  CONSTRAINT `match_home_team_fk` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=utf8;

INSERT INTO `matches` (`id`, `match_day`, `fixture_id`, `week`, `home_team_id`, `away_team_id`) VALUES
(1, '2022-08-05 21:00:00', 1, 1, 12, 18),
(2, '2022-08-06 19:15:00', 1, 1, 17, 9),
(3, '2022-08-06 21:45:00', 1, 1, 6, 15),
(4, '2022-08-07 19:15:00', 1, 1, 13, 2),
(5, '2022-08-07 19:15:00', 1, 1, 10, 1),
(6, '2022-08-07 21:45:00', 1, 1, 4, 8),
(7, '2022-08-08 19:15:00', 1, 1, 5, 14),
(8, '2022-08-08 21:45:00', 1, 1, 3, 16),
(9, '2022-08-08 21:45:00', 1, 1, 7, 19),
(10, '2022-08-12 21:00:00', 1, 2, 18, 11),
(11, '2022-08-13 19:15:00', 1, 2, 15, 12),
(12, '2022-08-13 21:45:00', 1, 2, 8, 10),
(13, '2022-08-13 21:45:00', 1, 2, 1, 17),
(14, '2022-08-14 19:15:00', 1, 2, 19, 4),
(15, '2022-08-14 19:15:00', 1, 2, 9, 3),
(16, '2022-08-14 21:45:00', 1, 2, 2, 6),
(17, '2022-08-15 19:15:00', 1, 2, 16, 5),
(18, '2022-08-15 21:45:00', 1, 2, 14, 7),
(19, '2022-08-19 21:00:00', 1, 3, 19, 8),
(20, '2022-08-20 19:15:00', 1, 3, 10, 14),
(21, '2022-08-20 19:15:00', 1, 3, 11, 9),
(22, '2022-08-20 21:45:00', 1, 3, 4, 18),
(23, '2022-08-21 19:15:00', 1, 3, 5, 15),
(24, '2022-08-21 21:45:00', 1, 3, 6, 13),
(25, '2022-08-22 19:15:00', 1, 3, 17, 2),
(26, '2022-08-22 19:15:00', 1, 3, 12, 16),
(27, '2022-08-22 21:45:00', 1, 3, 7, 1),
(28, '2022-08-26 21:00:00', 1, 4, 9, 4),
(29, '2022-08-27 19:15:00', 1, 4, 13, 3),
(30, '2022-08-27 21:45:00', 1, 4, 2, 12),
(31, '2022-08-27 21:45:00', 1, 4, 1, 19),
(32, '2022-08-28 19:15:00', 1, 4, 14, 11),
(33, '2022-08-28 19:15:00', 1, 4, 15, 10),
(34, '2022-08-28 21:45:00', 1, 4, 18, 8),
(35, '2022-08-29 19:15:00', 1, 4, 16, 7),
(36, '2022-08-29 21:45:00', 1, 4, 6, 17),
(37, '2022-09-02 21:00:00', 1, 5, 19, 18),
(38, '2022-09-03 19:15:00', 1, 5, 17, 13),
(39, '2022-09-03 19:15:00', 1, 5, 5, 2),
(40, '2022-09-03 21:45:00', 1, 5, 7, 15),
(41, '2022-09-03 21:45:00', 1, 5, 10, 16),
(42, '2022-09-04 19:15:00', 1, 5, 11, 1),
(43, '2022-09-04 21:45:00', 1, 5, 4, 14),
(44, '2022-09-04 21:45:00', 1, 5, 3, 6),
(45, '2022-09-05 21:00:00', 1, 5, 8, 9),
(46, '2022-09-11 00:00:00', 1, 6, 2, 3),
(47, '2022-09-11 00:00:00', 1, 6, 6, 5),
(48, '2022-09-11 00:00:00', 1, 6, 17, 12),
(49, '2022-09-11 00:00:00', 1, 6, 13, 10),
(50, '2022-09-11 00:00:00', 1, 6, 9, 19),
(51, '2022-09-11 00:00:00', 1, 6, 1, 18),
(52, '2022-09-11 00:00:00', 1, 6, 14, 8),
(53, '2022-09-11 00:00:00', 1, 6, 16, 11),
(54, '2022-09-11 00:00:00', 1, 6, 15, 4),
(55, '2022-09-18 00:00:00', 1, 7, 4, 1),
(56, '2022-09-18 00:00:00', 1, 7, 12, 6),
(57, '2022-09-18 00:00:00', 1, 7, 7, 2),
(58, '2022-09-18 00:00:00', 1, 7, 19, 14),
(59, '2022-09-18 00:00:00', 1, 7, 8, 16),
(60, '2022-09-18 00:00:00', 1, 7, 18, 9),
(61, '2022-09-18 00:00:00', 1, 7, 3, 17),
(62, '2022-09-18 00:00:00', 1, 7, 5, 13),
(63, '2022-09-18 00:00:00', 1, 7, 11, 15),
(64, '2022-10-02 00:00:00', 1, 8, 2, 10),
(65, '2022-10-02 00:00:00', 1, 8, 13, 12),
(66, '2022-10-02 00:00:00', 1, 8, 6, 7),
(67, '2022-10-02 00:00:00', 1, 8, 17, 11),
(68, '2022-10-02 00:00:00', 1, 8, 3, 5),
(69, '2022-10-02 00:00:00', 1, 8, 1, 8),
(70, '2022-10-02 00:00:00', 1, 8, 14, 9),
(71, '2022-10-02 00:00:00', 1, 8, 16, 19),
(72, '2022-10-02 00:00:00', 1, 8, 15, 18),
(73, '2022-10-09 00:00:00', 1, 9, 4, 16),
(74, '2022-10-09 00:00:00', 1, 9, 12, 3),
(75, '2022-10-09 00:00:00', 1, 9, 7, 13),
(76, '2022-10-09 00:00:00', 1, 9, 19, 15),
(77, '2022-10-09 00:00:00', 1, 9, 18, 14),
(78, '2022-10-09 00:00:00', 1, 9, 9, 1),
(79, '2022-10-09 00:00:00', 1, 9, 5, 17),
(80, '2022-10-09 00:00:00', 1, 9, 10, 6),
(81, '2022-10-09 00:00:00', 1, 9, 11, 2),
(82, '2022-10-16 00:00:00', 1, 10, 2, 4),
(83, '2022-10-16 00:00:00', 1, 10, 6, 18),
(84, '2022-10-16 00:00:00', 1, 10, 17, 10),
(85, '2022-10-16 00:00:00', 1, 10, 5, 12),
(86, '2022-10-16 00:00:00', 1, 10, 13, 11),
(87, '2022-10-16 00:00:00', 1, 10, 3, 7),
(88, '2022-10-16 00:00:00', 1, 10, 14, 1),
(89, '2022-10-16 00:00:00', 1, 10, 16, 9),
(90, '2022-10-16 00:00:00', 1, 10, 15, 8),
(91, '2022-10-23 00:00:00', 1, 11, 4, 12),
(92, '2022-10-23 00:00:00', 1, 11, 8, 2),
(93, '2022-10-23 00:00:00', 1, 11, 7, 5),
(94, '2022-10-23 00:00:00', 1, 11, 19, 13),
(95, '2022-10-23 00:00:00', 1, 11, 18, 17),
(96, '2022-10-23 00:00:00', 1, 11, 1, 16),
(97, '2022-10-23 00:00:00', 1, 11, 14, 15),
(98, '2022-10-23 00:00:00', 1, 11, 10, 3),
(99, '2022-10-23 00:00:00', 1, 11, 11, 6),
(100, '2022-10-30 00:00:00', 1, 12, 2, 9),
(101, '2022-10-30 00:00:00', 1, 12, 6, 19),
(102, '2022-10-30 00:00:00', 1, 12, 17, 4),
(103, '2022-10-30 00:00:00', 1, 12, 12, 7),
(104, '2022-10-30 00:00:00', 1, 12, 13, 8),
(105, '2022-10-30 00:00:00', 1, 12, 3, 11),
(106, '2022-10-30 00:00:00', 1, 12, 5, 10),
(107, '2022-10-30 00:00:00', 1, 12, 16, 14),
(108, '2022-10-30 00:00:00', 1, 12, 15, 1),
(109, '2022-11-06 00:00:00', 1, 13, 4, 13),
(110, '2022-11-06 00:00:00', 1, 13, 8, 6),
(111, '2022-11-06 00:00:00', 1, 13, 7, 17),
(112, '2022-11-06 00:00:00', 1, 13, 10, 12),
(113, '2022-11-06 00:00:00', 1, 13, 19, 2),
(114, '2022-11-06 00:00:00', 1, 13, 18, 16),
(115, '2022-11-06 00:00:00', 1, 13, 9, 15),
(116, '2022-11-06 00:00:00', 1, 13, 14, 3),
(117, '2022-11-06 00:00:00', 1, 13, 11, 5),
(118, '2022-11-13 00:00:00', 1, 14, 2, 1),
(119, '2022-11-13 00:00:00', 1, 14, 6, 4),
(120, '2022-11-13 00:00:00', 1, 14, 17, 19),
(121, '2022-11-13 00:00:00', 1, 14, 12, 11),
(122, '2022-11-13 00:00:00', 1, 14, 7, 10),
(123, '2022-11-13 00:00:00', 1, 14, 13, 9),
(124, '2022-11-13 00:00:00', 1, 14, 3, 18),
(125, '2022-11-13 00:00:00', 1, 14, 5, 8),
(126, '2022-11-13 00:00:00', 1, 14, 15, 16),
(127, '2022-12-25 00:00:00', 1, 15, 4, 3),
(128, '2022-12-25 00:00:00', 1, 15, 8, 12),
(129, '2022-12-25 00:00:00', 1, 15, 19, 5),
(130, '2022-12-25 00:00:00', 1, 15, 18, 7),
(131, '2022-12-25 00:00:00', 1, 15, 9, 6),
(132, '2022-12-25 00:00:00', 1, 15, 1, 13),
(133, '2022-12-25 00:00:00', 1, 15, 14, 17),
(134, '2022-12-25 00:00:00', 1, 15, 16, 2),
(135, '2022-12-25 00:00:00', 1, 15, 11, 10),
(136, '2022-12-28 00:00:00', 1, 16, 2, 15),
(137, '2022-12-28 00:00:00', 1, 16, 6, 1),
(138, '2022-12-28 00:00:00', 1, 16, 17, 8),
(139, '2022-12-28 00:00:00', 1, 16, 12, 14),
(140, '2022-12-28 00:00:00', 1, 16, 7, 11),
(141, '2022-12-28 00:00:00', 1, 16, 13, 18),
(142, '2022-12-28 00:00:00', 1, 16, 3, 19),
(143, '2022-12-28 00:00:00', 1, 16, 5, 4),
(144, '2022-12-28 00:00:00', 1, 16, 10, 9),
(145, '2023-01-04 00:00:00', 1, 17, 4, 7),
(146, '2023-01-04 00:00:00', 1, 17, 8, 3),
(147, '2023-01-04 00:00:00', 1, 17, 1, 12),
(148, '2023-01-04 00:00:00', 1, 17, 19, 11),
(149, '2023-01-04 00:00:00', 1, 17, 18, 10),
(150, '2023-01-04 00:00:00', 1, 17, 9, 5),
(151, '2023-01-04 00:00:00', 1, 17, 14, 2),
(152, '2023-01-04 00:00:00', 1, 17, 16, 17),
(153, '2023-01-04 00:00:00', 1, 17, 15, 13),
(154, '2023-01-08 00:00:00', 1, 18, 2, 18),
(155, '2023-01-08 00:00:00', 1, 18, 6, 14),
(156, '2023-01-08 00:00:00', 1, 18, 12, 9),
(157, '2023-01-08 00:00:00', 1, 18, 7, 8),
(158, '2023-01-08 00:00:00', 1, 18, 13, 16),
(159, '2023-01-08 00:00:00', 1, 18, 3, 15),
(160, '2023-01-08 00:00:00', 1, 18, 5, 1),
(161, '2023-01-08 00:00:00', 1, 18, 10, 19),
(162, '2023-01-08 00:00:00', 1, 18, 11, 4),
(163, '2023-01-15 00:00:00', 1, 19, 4, 10),
(164, '2023-01-15 00:00:00', 1, 19, 19, 12),
(165, '2023-01-15 00:00:00', 1, 19, 8, 11),
(166, '2023-01-15 00:00:00', 1, 19, 18, 5),
(167, '2023-01-15 00:00:00', 1, 19, 9, 7),
(168, '2023-01-15 00:00:00', 1, 19, 1, 3),
(169, '2023-01-15 00:00:00', 1, 19, 14, 13),
(170, '2023-01-15 00:00:00', 1, 19, 16, 6),
(171, '2023-01-15 00:00:00', 1, 19, 15, 17),
(172, '2023-01-22 00:00:00', 1, 20, 18, 12),
(173, '2023-01-22 00:00:00', 1, 20, 9, 17),
(174, '2023-01-22 00:00:00', 1, 20, 15, 6),
(175, '2023-01-22 00:00:00', 1, 20, 2, 13),
(176, '2023-01-22 00:00:00', 1, 20, 1, 10),
(177, '2023-01-22 00:00:00', 1, 20, 8, 4),
(178, '2023-01-22 00:00:00', 1, 20, 14, 5),
(179, '2023-01-22 00:00:00', 1, 20, 16, 3),
(180, '2023-01-22 00:00:00', 1, 20, 19, 7),
(181, '2023-01-29 00:00:00', 1, 21, 11, 18),
(182, '2023-01-29 00:00:00', 1, 21, 12, 15),
(183, '2023-01-29 00:00:00', 1, 21, 10, 8),
(184, '2023-01-29 00:00:00', 1, 21, 17, 1),
(185, '2023-01-29 00:00:00', 1, 21, 4, 19),
(186, '2023-01-29 00:00:00', 1, 21, 3, 9),
(187, '2023-01-29 00:00:00', 1, 21, 6, 2),
(188, '2023-01-29 00:00:00', 1, 21, 5, 16),
(189, '2023-01-29 00:00:00', 1, 21, 7, 14),
(190, '2023-02-01 00:00:00', 1, 22, 8, 19),
(191, '2023-02-01 00:00:00', 1, 22, 14, 10),
(192, '2023-02-01 00:00:00', 1, 22, 9, 11),
(193, '2023-02-01 00:00:00', 1, 22, 18, 4),
(194, '2023-02-01 00:00:00', 1, 22, 15, 5),
(195, '2023-02-01 00:00:00', 1, 22, 13, 6),
(196, '2023-02-01 00:00:00', 1, 22, 2, 17),
(197, '2023-02-01 00:00:00', 1, 22, 16, 12),
(198, '2023-02-01 00:00:00', 1, 22, 1, 7),
(199, '2023-02-05 00:00:00', 1, 23, 4, 9),
(200, '2023-02-05 00:00:00', 1, 23, 3, 13),
(201, '2023-02-05 00:00:00', 1, 23, 12, 2),
(202, '2023-02-05 00:00:00', 1, 23, 19, 1),
(203, '2023-02-05 00:00:00', 1, 23, 11, 14),
(204, '2023-02-05 00:00:00', 1, 23, 10, 15),
(205, '2023-02-05 00:00:00', 1, 23, 8, 18),
(206, '2023-02-05 00:00:00', 1, 23, 7, 16),
(207, '2023-02-05 00:00:00', 1, 23, 17, 6),
(208, '2023-02-12 00:00:00', 1, 24, 18, 19),
(209, '2023-02-12 00:00:00', 1, 24, 13, 17),
(210, '2023-02-12 00:00:00', 1, 24, 2, 5),
(211, '2023-02-12 00:00:00', 1, 24, 15, 7),
(212, '2023-02-12 00:00:00', 1, 24, 16, 10),
(213, '2023-02-12 00:00:00', 1, 24, 1, 11),
(214, '2023-02-12 00:00:00', 1, 24, 14, 4),
(215, '2023-02-12 00:00:00', 1, 24, 6, 3),
(216, '2023-02-12 00:00:00', 1, 24, 9, 8),
(217, '2023-02-19 00:00:00', 1, 25, 3, 2),
(218, '2023-02-19 00:00:00', 1, 25, 5, 6),
(219, '2023-02-19 00:00:00', 1, 25, 12, 17),
(220, '2023-02-19 00:00:00', 1, 25, 10, 13),
(221, '2023-02-19 00:00:00', 1, 25, 19, 9),
(222, '2023-02-19 00:00:00', 1, 25, 18, 1),
(223, '2023-02-19 00:00:00', 1, 25, 8, 14),
(224, '2023-02-19 00:00:00', 1, 25, 11, 16),
(225, '2023-02-19 00:00:00', 1, 25, 4, 15),
(226, '2023-02-26 00:00:00', 1, 26, 1, 4),
(227, '2023-02-26 00:00:00', 1, 26, 6, 12),
(228, '2023-02-26 00:00:00', 1, 26, 2, 7),
(229, '2023-02-26 00:00:00', 1, 26, 14, 19),
(230, '2023-02-26 00:00:00', 1, 26, 16, 8),
(231, '2023-02-26 00:00:00', 1, 26, 9, 18),
(232, '2023-02-26 00:00:00', 1, 26, 17, 3),
(233, '2023-02-26 00:00:00', 1, 26, 13, 5),
(234, '2023-02-26 00:00:00', 1, 26, 15, 11),
(235, '2023-03-05 00:00:00', 1, 27, 10, 2),
(236, '2023-03-05 00:00:00', 1, 27, 12, 13),
(237, '2023-03-05 00:00:00', 1, 27, 7, 6),
(238, '2023-03-05 00:00:00', 1, 27, 11, 17),
(239, '2023-03-05 00:00:00', 1, 27, 5, 3),
(240, '2023-03-05 00:00:00', 1, 27, 8, 1),
(241, '2023-03-05 00:00:00', 1, 27, 9, 14),
(242, '2023-03-05 00:00:00', 1, 27, 19, 16),
(243, '2023-03-05 00:00:00', 1, 27, 18, 15),
(244, '2023-03-12 00:00:00', 1, 28, 16, 4),
(245, '2023-03-12 00:00:00', 1, 28, 3, 12),
(246, '2023-03-12 00:00:00', 1, 28, 13, 7),
(247, '2023-03-12 00:00:00', 1, 28, 15, 19),
(248, '2023-03-12 00:00:00', 1, 28, 14, 18),
(249, '2023-03-12 00:00:00', 1, 28, 1, 9),
(250, '2023-03-12 00:00:00', 1, 28, 17, 5),
(251, '2023-03-12 00:00:00', 1, 28, 6, 10),
(252, '2023-03-12 00:00:00', 1, 28, 2, 11),
(253, '2023-03-19 00:00:00', 1, 29, 4, 2),
(254, '2023-03-19 00:00:00', 1, 29, 18, 6),
(255, '2023-03-19 00:00:00', 1, 29, 10, 17),
(256, '2023-03-19 00:00:00', 1, 29, 12, 5),
(257, '2023-03-19 00:00:00', 1, 29, 11, 13),
(258, '2023-03-19 00:00:00', 1, 29, 7, 3),
(259, '2023-03-19 00:00:00', 1, 29, 1, 14),
(260, '2023-03-19 00:00:00', 1, 29, 9, 16),
(261, '2023-03-19 00:00:00', 1, 29, 8, 15),
(262, '2023-04-02 00:00:00', 1, 30, 12, 4),
(263, '2023-04-02 00:00:00', 1, 30, 2, 8),
(264, '2023-04-02 00:00:00', 1, 30, 5, 7),
(265, '2023-04-02 00:00:00', 1, 30, 13, 19),
(266, '2023-04-02 00:00:00', 1, 30, 17, 18),
(267, '2023-04-02 00:00:00', 1, 30, 16, 1),
(268, '2023-04-02 00:00:00', 1, 30, 15, 14),
(269, '2023-04-02 00:00:00', 1, 30, 3, 10),
(270, '2023-04-02 00:00:00', 1, 30, 6, 11),
(271, '2023-04-09 00:00:00', 1, 31, 9, 2),
(272, '2023-04-09 00:00:00', 1, 31, 19, 6),
(273, '2023-04-09 00:00:00', 1, 31, 4, 17),
(274, '2023-04-09 00:00:00', 1, 31, 7, 12),
(275, '2023-04-09 00:00:00', 1, 31, 8, 13),
(276, '2023-04-09 00:00:00', 1, 31, 11, 3),
(277, '2023-04-09 00:00:00', 1, 31, 10, 5),
(278, '2023-04-09 00:00:00', 1, 31, 14, 16),
(279, '2023-04-09 00:00:00', 1, 31, 1, 15),
(280, '2023-04-16 00:00:00', 1, 32, 13, 4),
(281, '2023-04-16 00:00:00', 1, 32, 6, 8),
(282, '2023-04-16 00:00:00', 1, 32, 17, 7),
(283, '2023-04-16 00:00:00', 1, 32, 12, 10),
(284, '2023-04-16 00:00:00', 1, 32, 2, 19),
(285, '2023-04-16 00:00:00', 1, 32, 16, 18),
(286, '2023-04-16 00:00:00', 1, 32, 15, 9),
(287, '2023-04-16 00:00:00', 1, 32, 3, 14),
(288, '2023-04-16 00:00:00', 1, 32, 5, 11),
(289, '2023-04-23 00:00:00', 1, 33, 1, 2),
(290, '2023-04-23 00:00:00', 1, 33, 4, 6),
(291, '2023-04-23 00:00:00', 1, 33, 19, 17),
(292, '2023-04-23 00:00:00', 1, 33, 11, 12),
(293, '2023-04-23 00:00:00', 1, 33, 10, 7),
(294, '2023-04-23 00:00:00', 1, 33, 9, 13),
(295, '2023-04-23 00:00:00', 1, 33, 18, 3),
(296, '2023-04-23 00:00:00', 1, 33, 8, 5),
(297, '2023-04-23 00:00:00', 1, 33, 16, 15),
(298, '2023-04-30 00:00:00', 1, 34, 3, 4),
(299, '2023-04-30 00:00:00', 1, 34, 12, 8),
(300, '2023-04-30 00:00:00', 1, 34, 5, 19),
(301, '2023-04-30 00:00:00', 1, 34, 7, 18),
(302, '2023-04-30 00:00:00', 1, 34, 6, 9),
(303, '2023-04-30 00:00:00', 1, 34, 13, 1),
(304, '2023-04-30 00:00:00', 1, 34, 17, 14),
(305, '2023-04-30 00:00:00', 1, 34, 2, 16),
(306, '2023-04-30 00:00:00', 1, 34, 10, 11),
(307, '2023-05-07 00:00:00', 1, 35, 15, 2),
(308, '2023-05-07 00:00:00', 1, 35, 1, 6),
(309, '2023-05-07 00:00:00', 1, 35, 8, 17),
(310, '2023-05-07 00:00:00', 1, 35, 14, 12),
(311, '2023-05-07 00:00:00', 1, 35, 11, 7),
(312, '2023-05-07 00:00:00', 1, 35, 18, 13),
(313, '2023-05-07 00:00:00', 1, 35, 19, 3),
(314, '2023-05-07 00:00:00', 1, 35, 4, 5),
(315, '2023-05-07 00:00:00', 1, 35, 9, 10),
(316, '2023-05-14 00:00:00', 1, 36, 7, 4),
(317, '2023-05-14 00:00:00', 1, 36, 3, 8),
(318, '2023-05-14 00:00:00', 1, 36, 12, 1),
(319, '2023-05-14 00:00:00', 1, 36, 11, 19),
(320, '2023-05-14 00:00:00', 1, 36, 10, 18),
(321, '2023-05-14 00:00:00', 1, 36, 5, 9),
(322, '2023-05-14 00:00:00', 1, 36, 2, 14),
(323, '2023-05-14 00:00:00', 1, 36, 17, 16),
(324, '2023-05-14 00:00:00', 1, 36, 13, 15),
(325, '2023-05-21 00:00:00', 1, 37, 18, 2),
(326, '2023-05-21 00:00:00', 1, 37, 14, 6),
(327, '2023-05-21 00:00:00', 1, 37, 9, 12),
(328, '2023-05-21 00:00:00', 1, 37, 8, 7),
(329, '2023-05-21 00:00:00', 1, 37, 16, 13),
(330, '2023-05-21 00:00:00', 1, 37, 15, 3),
(331, '2023-05-21 00:00:00', 1, 37, 1, 5),
(332, '2023-05-21 00:00:00', 1, 37, 19, 10),
(333, '2023-05-21 00:00:00', 1, 37, 4, 11),
(334, '2023-05-28 00:00:00', 1, 38, 10, 4),
(335, '2023-05-28 00:00:00', 1, 38, 12, 19),
(336, '2023-05-28 00:00:00', 1, 38, 11, 8),
(337, '2023-05-28 00:00:00', 1, 38, 5, 18),
(338, '2023-05-28 00:00:00', 1, 38, 7, 9),
(339, '2023-05-28 00:00:00', 1, 38, 3, 1),
(340, '2023-05-28 00:00:00', 1, 38, 13, 14),
(341, '2023-05-28 00:00:00', 1, 38, 6, 16),
(342, '2023-05-28 00:00:00', 1, 38, 17, 15);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;