CREATE VIEW `last_five_states` AS
SELECT
    `fixture_view`.`id` AS `id`,
    `fixture_view`.`home_team_id` AS `home_team_id`,
    `fixture_view`.`away_team_id` AS `away_team_id`,
    `fixture_view`.`home_team_score` AS `home_team_score`,
    `fixture_view`.`away_team_score` AS `away_team_score`,
    (
        CASE
            WHEN (`fixture_view`.`home_team_score` > `fixture_view`.`away_team_score`)
                THEN 'home_win'
            WHEN (`fixture_view`.`away_team_score` > `fixture_view`.`home_team_score`)
                THEN 'away_win'
            ELSE 'draw'
        END
    ) AS `state`
FROM
    `fixture_view`
WHERE
    `fixture_view`.`match_day` < NOW()
ORDER BY
    `fixture_view`.`match_day` DESC;