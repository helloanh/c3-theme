<?php
use \CCC\Data\OurWork\Mission;

$ourWorkMission = new Mission('our-work-mission');
?>

<div class="row">
    <div class="col-md-5 col-sm-12">
        <?php
        echo $ourWorkMission->post->get('post_content');
        foreach($ourWorkMission->params as $key) {
            $style = $key > 1 ? 'ele-hide' : null;
            echo '<div id="text-block-'.$key.'" class="text-block '.$style.'">';
                echo $ourWorkMission->post->get('metas')->get('text_block'.$key);
            echo '</div>';
        }
        ?>
    </div>
    <div class="col-md-6 col-sm-12 col-lg-offset-1 col-md-offset-0">
        <div class="row">
			<?= $ourWorkMission; ?>
        </div>
    </div>
</div>