CREATE VIEW standings AS
SELECT
    t.display_name,
    (
            (SELECT count(*) FROM results_view rw WHERE rw.home_team_id=t.id and rw.home_points = 3)
            +
            (SELECT count(*) FROM results_view rw WHERE rw.away_team_id=t.id and rw.away_points = 3)
        ) AS win,
    (
            (SELECT count(*) FROM results_view rw WHERE rw.home_team_id=t.id and rw.home_points = 1)
            +
            (SELECT count(*) FROM results_view rw WHERE rw.away_team_id=t.id and rw.away_points = 1)
        ) AS draw,
    (
            (SELECT count(*) FROM results_view rw WHERE rw.home_team_id=t.id and rw.home_points = 0)
            +
            (SELECT count(*) FROM results_view rw WHERE rw.away_team_id=t.id and rw.away_points = 0)
        ) AS lose,
    (
        SELECT count(*) FROM results_view rw WHERE rw.home_team_id=t.id or rw.away_team_id=t.id
    ) AS played,
    (
            (SELECT IFNULL(SUM(rw.home_score),0) FROM results_view as rw WHERE rw.home_team_id=t.id)
            +
            (SELECT IFNULL(SUM(rw.away_score),0) FROM results_view AS rw WHERE rw.away_team_id=t.id)
        ) AS goal_scored,
    (
            (SELECT IFNULL(SUM(rw.away_score),0) FROM results_view as rw WHERE rw.home_team_id=t.id)
            +
            (SELECT IFNULL(SUM(rw.home_score),0) FROM results_view AS rw WHERE rw.away_team_id=t.id)
        ) AS goal_conceded,
    (
            (
                    (SELECT IFNULL(SUM(rw.home_score),0) FROM results_view as rw WHERE rw.home_team_id=t.id)
                    +
                    (SELECT IFNULL(SUM(rw.away_score),0) FROM results_view AS rw WHERE rw.away_team_id=t.id)
                ) - (
                    (SELECT IFNULL(SUM(rw.away_score),0) FROM results_view as rw WHERE rw.home_team_id=t.id)
                    +
                    (SELECT IFNULL(SUM(rw.home_score),0) FROM results_view AS rw WHERE rw.away_team_id=t.id)
                )
        ) AS goal_difference,
    (
            (SELECT IFNULL(SUM(rw.home_points),0) FROM results_view as rw WHERE rw.home_team_id=t.id)
            +
            (SELECT IFNULL(SUM(rw.away_points),0) FROM results_view AS rw WHERE rw.away_team_id=t.id)
        ) AS points
FROM teams as t

ORDER BY
    points DESC,
    goal_difference DESC,
    goal_scored DESC,
    goal_conceded DESC,
    display_name ASC;