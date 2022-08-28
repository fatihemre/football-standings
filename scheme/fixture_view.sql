CREATE VIEW `fixture_view` AS
SELECT
    `m`.`id` AS `id`,
    `m`.`fixture_id` AS `fixture_id`,
    `m`.`week` AS `week`,
    `home_team`.`id` AS `home_team_id`,
    `home_team`.`short_code` AS `home_team_short_code`,
    `home_team`.`display_name` AS `home_team_name`,
    (SELECT COUNT(`id`) FROM `goals` AS `g` WHERE `g`.`match_id`=`m`.`id` AND `g`.`team_id`=`m`.`home_team_id`) AS `home_team_score`,
    `away_team`.`id` AS `away_team_id`,
    `away_team`.`short_code` AS `away_team_short_code`,
    `away_team`.`display_name` AS `away_team_name`,
    (SELECT COUNT(`id`) FROM `goals` AS `g` WHERE `g`.`match_id`=`m`.`id` AND `g`.`team_id`=`m`.`away_team_id`) AS `away_team_score`,
    `m`.`match_day` AS `match_day`
FROM
    `matches` AS `m`
LEFT JOIN
    `teams` AS `home_team` ON(`home_team`.`id` = `m`.`home_team_id`)
LEFT JOIN
    `teams` AS `away_team` ON(`away_team`.`id` = `m`.`away_team_id`)
ORDER BY
    `m`.`match_day` ASC, `home_team`.`display_name` ASC, `away_team`.`display_name` ASC;