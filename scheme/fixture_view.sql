CREATE VIEW fixture_view AS
SELECT
    m.id,
    m.fixture_id,
    m.week,
    home_team.display_name as home_team_name,
    home_team.short_code as home_team_short_code,
    (select count(g.id) from goals as g where g.match_id=m.id and g.team_id=m.home_team_id) AS home_team_score,
    away_team.display_name as away_team_name,
    away_team.short_code as away_team_short_code,
    (select count(g.id) from goals as g where g.match_id=m.id and g.team_id=m.away_team_id) AS away_team_score,
    m.match_day
FROM matches AS m
         LEFT JOIN teams AS home_team ON(home_team.id=m.home_team_id)
         LEFT JOIN teams AS away_team ON(away_team.id=m.away_team_id)
ORDER BY m.match_day ASC, home_team_name ASC;