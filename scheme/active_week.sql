CREATE VIEW `active_week` AS
SELECT (
    (
        (
            (SELECT COUNT(`fixture_view`.`id`) FROM `fixture_view` WHERE `fixture_view`.`match_day` < NOW())
            -
            (
                (SELECT COUNT(`fixture_view`.`id`) FROM `fixture_view` WHERE `fixture_view`.`match_day` < NOW())
                %
                FLOOR((SELECT COUNT(`teams`.`id`) FROM `teams`) / 2)
            )
        )
        /
        (
            FLOOR((SELECT COUNT(`teams`.`id`) FROM `teams`) / 2)
        )
    ) + 1
) AS `active_week`;