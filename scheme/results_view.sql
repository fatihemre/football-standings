CREATE VIEW `results_view` AS
SELECT
    `result`.`id` AS `match_id`,
    `result`.`fixture_id` AS `fixture_id`,
    `result`.`home_team_id` AS `home_team_id`,
    `result`.`home_score` AS `home_score`,
    (
        CASE
            WHEN (`result`.`home_score` > `result`.`away_score`)
                THEN 3
            WHEN (`result`.`away_score` > `result`.`home_score`)
                THEN 0
            ELSE 1
        END
    ) AS `home_points`,
    `result`.`away_team_id` AS `away_team_id`,
    `result`.`away_score` AS `away_score`,
    (
        CASE
            WHEN (`result`.`away_score` > `result`.`home_score`)
                THEN 3
            WHEN (`result`.`home_score` > `result`.`away_score`)
                THEN 0
            ELSE 1
        END
    ) AS `away_points`
FROM
(
    SELECT
        `m`.`id` AS `id`,
        `m`.`fixture_id` AS `fixture_id`,
        `m`.`home_team_id` AS `home_team_id`,
        (SELECT count(`id`) FROM `goals` WHERE `goals`.`match_id` = `m`.`id` AND `goals`.`team_id` = `m`.`home_team_id`) AS `home_score`,
        `m`.`away_team_id` AS `away_team_id`,
        (SELECT count(0) FROM `goals` WHERE `goals`.`match_id` = `m`.`id` AND `goals`.`team_id` = `m`.`away_team_id`) AS `away_score`
    FROM
        `matches` AS `m`
    WHERE
        `m`.`match_day` < now()
) AS `result`;


