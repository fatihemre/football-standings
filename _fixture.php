<?php
$sth = $db->prepare("SELECT * FROM fixture_view WHERE fixture_id=:fixture_id");
$sth->execute(['fixture_id'=>ACTIVE_FIXTURE_ID]);
$_fixture = $sth->fetchAll(\PDO::FETCH_OBJ);
$fixture = [];
foreach($_fixture as $m) {
    $fixture['Maç ' . $m->week . '/38'][] = $m;
}
?>
<header>
    <h5>Fikstür</h5>
</header>
<section>
<?php foreach($fixture as $week=>$matches): ?>
    <div class="fixture">
        <div class="week">
            <?php echo $week; ?>
        </div>
        <div class="matches">
            <?php
            $today = new DateTime('now');
            foreach($matches as $match):
                $match_day = new DateTime($match->match_day);
                $is_played = $match_day < $today;
                ?>
                <div class="match">
                    <div class="clubs">
                        <div class="club">
                            <div class="home">
                                <?php
                                $arma = file_exists(__DIR__.'/assets/images/clubs/'. strtolower($match->home_team_short_code) .'.png') ?
                                    'assets/images/clubs/'. strtolower($match->home_team_short_code) .'.png' :
                                    'assets/images/clubs/shield.png';
                                ?>

                                <img src="<?php echo $arma; ?>" alt="<?php echo $match->home_team_name;?> Arması">
                                <div class="team">
                                    <?php echo $match->home_team_name; ?>
                                </div>
                            </div>
                            <div class="score">
                                <?php echo $is_played ? $match->home_team_score : '-'; ?>
                                <?php if($match->home_team_score > $match->away_team_score): ?>
                                    <svg class="winner" aria-label="Winner" height="8" role="img" width="6"><polygon fill="#262626" points="6,0 6,8 0,4"></polygon></svg>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="club">
                            <div class="away">
                                <?php
                                $arma = file_exists(__DIR__.'/assets/images/clubs/'. $match->away_team_short_code .'.png') ?
                                    'assets/images/clubs/'. strtolower($match->away_team_short_code) .'.png' :
                                    'assets/images/clubs/shield.png';
                                ?>

                                <img src="<?php echo $arma; ?>" alt="<?php echo $match->away_team_name;?> Arması">
                                <div class="team"><?php echo $match->away_team_name; ?></div>
                            </div>
                            <div class="score">
                                <?php echo $is_played ? $match->away_team_score : '-'; ?>
                                <?php if($match->away_team_score > $match->home_team_score): ?>
                                    <svg class="winner" aria-label="Winner" height="8" role="img" width="6"><polygon fill="#262626" points="6,0 6,8 0,4"></polygon></svg>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="datetime">
                        <div><?php echo date('d/m D', strtotime($match->match_day)); ?></div>
                        <div><?php echo date('H:i', strtotime($match->match_day)); ?></div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php endforeach; ?>


</section>