 <?php

/*
Template Name: ChangeWire Videos 
*/

get_header('changewire'); 
global $hub;
?>

 <div class="container" id="changewire-headlines">
    <div class="hub-section section-no-padding row">
        <div class="col-lg-12">
            <h1 class="text-center">All Videos </h1>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="stories-list story-border-top">
                <div class="badge"> Videos</div>
            </div>
            <?= $hub->videos(20); ?>
            <br><br>
        </div>
        <div class="col-md-4 col-xs-12">
           <div class="stories-list story-border-top">
                <div class="badge">Contributors</div>
                    <a href="https://communitychange.org/authors/" class="see-all">See All</a>
                </div>
           <div class="hub-contributors">
             <?= $hub->contributors(); ?>
           </div>
        </div>
        <div class="col-md-8 col-xs-12">
           <div class="stories-list story-border-top">
                <div class="badge">Most Read</div>
                <!-- <a href="#" class="see-all">See All</a> -->
            </div>
            <?= $hub->mostRead(7); ?>
        </div>
    </div>
</div>

<?php get_footer('changewire'); ?>