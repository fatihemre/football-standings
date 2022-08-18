<?php
$standings = $db->query("SELECT * FROM standings")->fetchAll(\PDO::FETCH_OBJ);
?>
<header>
    <h5>Puan Durumu</h5>
</header>
<section>
    <table class="standings">
        <thead>
        <tr>
            <th></th>
            <th>Takım</th>
            <th class="col">OM</th>
            <th class="col">G</th>
            <th class="col">B</th>
            <th class="col">M</th>
            <th class="col">AG</th>
            <th class="col">YG</th>
            <th class="col">A</th>
            <th class="col">P</th>
            <th width="90">Son 5</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($standings as $index=>$team): ?>
        <tr>
            <td>
                <div class="ucl"></div>
            </td>
            <td>
                <div class="team">
                    <span><?php echo $index+1; ?></span>
                    <?php
                        $arma = file_exists(__DIR__.'/assets/images/clubs/'. strtolower($team->short_code) .'.png') ?
                        'assets/images/clubs/'. strtolower($team->short_code) .'.png' :
                        'assets/images/clubs/shield.png';
                    ?>

                    <img src="<?php echo $arma; ?>" alt="<?php echo $team->display_name;?> Arması">

                    <span><?php echo $team->display_name; ?></span>
                </div>
            </td>
            <td class="col"><?php echo $team->played;?></td>
            <td class="col"><?php echo $team->win;?></td>
            <td class="col"><?php echo $team->draw;?></td>
            <td class="col"><?php echo $team->lose;?></td>
            <td class="col"><?php echo $team->goal_scored;?></td>
            <td class="col"><?php echo $team->goal_conceded;?></td>
            <td class="col"><?php echo $team->goal_difference;?></td>
            <td class="col"><?php echo $team->points;?></td>
            <td>
                <div class="results">
                    <div class="result"><img src="assets/images/winner.svg" alt="Galibiyet"></div>
                    <div class="result"><img src="assets/images/draw.svg" alt="Beraberlik"></div>
                    <div class="result"><img src="assets/images/loser.svg" alt="Mağlubiyet"></div>
                    <div class="result"><img src="assets/images/none.svg" alt="Oynanmadı"></div>
                    <div class="result"><img src="assets/images/none.svg" alt="Oynanmadı"></div>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>


        </tbody>
        </table>
</section>