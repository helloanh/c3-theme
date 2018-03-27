<?php
use \CCC\Data\TheLatest;
use \CCC\Services\PostQuery;

get_header();
?>

    <section id="home" class="pane-section">
        <div class="home-caption">
			<?= PostQuery::current()->get('post_content');?>
        </div>
	    <?=
	    ccc_social_share(
		    WP_HOME,
		    get_bloginfo('title'),
		    get_bloginfo('description'),
		    ['facebook', 'twitter'],
		    'social-links home-social-links'
	    );
	    ?>
    </section>

    <section id="our-work" class="pane-section">
        <div class="pane-menu pane-left">
            <h2>Our Work</h2>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#our-work-mission" aria-controls="our-work-mission" role="tab" data-toggle="tab">Mission</a></li>
                <li role="presentation"><a href="#our-work-model" aria-controls="our-work-model" role="tab" data-toggle="tab">Model</a></li>
                <li role="presentation"><a href="#our-work-impact" aria-controls="our-work-impact" role="tab" data-toggle="tab">Impact</a></li>
            </ul>
        </div>
        <div class="pane-content tab-content">
            <div role="tabpanel" class="tab-pane active" id="our-work-mission">
				<?php include 'views/our-work/mission.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="our-work-model">
				<?php include 'views/our-work/model.php'; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="our-work-impact">
				<?php include 'views/our-work/impact.php'; ?>
            </div>
        </div>
    </section>

    <section id="focus-areas" class="pane-section">
	    <?php include 'views/focus-areas.php'; ?>
    </section>

    <section id="the-latest" class="pane-section">
        <div class="container">
            <h2>The Latest</h2>
            <div class="row row-eq-height">
				<?= new TheLatest(); ?>
            </div>
        </div>
    </section>
    <script>
        jQuery('.focus-area a')[2].href = "http://communitychange.org/reinvestment";
        jQuery('.menu-item-7958').removeClass('active');
    </script>

<?php get_footer(); ?>