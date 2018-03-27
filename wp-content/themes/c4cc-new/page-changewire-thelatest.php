 <?php

/*
Template Name: ChangeWire The Latest All
*/

get_header('changewire'); 
global $hub;
?>

 <div class="container" id="changewire-headlines">
    <div class="hub-section section-no-padding row">
    	<div class="col-lg-12">
    		<h1 class="text-center"> The Latest</h1>
    	</div>

        <div class="col-lg-12">
           <div class="stories-list story-border-top">
                <!-- <div class="badge">Most Read</div> -->
                <!-- <a href="#" class="see-all">See All</a> -->
            </div>
			<?= $hub->TheLatestAll(); ?>
        </div>
    </div>
</div>
<?php get_footer('changewire'); ?>