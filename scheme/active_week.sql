CREATE VIEW active_week AS
SELECT (
    (
        (SELECT COUNT(id) FROM fixture_view WHERE match_day < NOW())
        -
        (
            MOD (
                (SELECT COUNT(id) FROM fixture_view WHERE match_day < NOW()),
                FLOOR((SELECT COUNT(id) FROM teams) / 2)
            )
        )
    )
    /
    FLOOR((SELECT COUNT(id) FROM teams) / 2)

) + 1 AS "active_week";