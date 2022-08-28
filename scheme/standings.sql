CREATE VIEW `standings` AS


select
    `t`.`id` AS `team_id`,
    `t`.`display_name` AS `display_name`,
    `t`.`short_code` AS `short_code`,
    (
        (select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) and (`rw`.`home_points` = 3)))
            +
        (select count(0) from `results_view` `rw` where ((`rw`.`away_team_id` = `t`.`id`) and (`rw`.`away_points` = 3)))
    ) AS `win`,
    (
        (select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) and (`rw`.`home_points` = 1)))
            +
        (select count(0) from `results_view` `rw` where ((`rw`.`away_team_id` = `t`.`id`) and (`rw`.`away_points` = 1)))
    ) AS `draw`,
    (
        (select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) and (`rw`.`home_points` = 0)))
            +
        (select count(0) from `results_view` `rw` where ((`rw`.`away_team_id` = `t`.`id`) and (`rw`.`away_points` = 0)))
    ) AS `lose`,
    (
        select count(0) from `results_view` `rw` where ((`rw`.`home_team_id` = `t`.`id`) or (`rw`.`away_team_id` = `t`.`id`))
    ) AS `played`,
    (
        (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`))
            +
        (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))
    ) AS `goal_scored`,
    (
        (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`))
            +
        (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))
    ) AS `goal_conceded`,
    (
        (
            (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`))
                +
            (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))
        )
            -
        (
            (select ifnull(sum(`rw`.`away_score`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`))
                +
            (select ifnull(sum(`rw`.`home_score`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))
        )
    ) AS `goal_difference`,
    (
        (select ifnull(sum(`rw`.`home_points`),0) from `results_view` `rw` where (`rw`.`home_team_id` = `t`.`id`))
            +
        (select ifnull(sum(`rw`.`away_points`),0) from `results_view` `rw` where (`rw`.`away_team_id` = `t`.`id`))
    ) AS `points`
from
    `teams` `t`
order by
    `points` DESC,
    `goal_difference` DESC,
    `goal_scored` DESC,
    `goal_conceded`,
    `t`.`display_name`;