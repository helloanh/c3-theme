<?php 

use CCC\Services\SinglePost;
$post = new SinglePost();
$campaignCtrl = new \CCC\Data\Campaign();
$postCategories = $post->getCategoryIds();
post_view_tracker($post->getId());

get_header(); ?>

<div id="single-campaign">

    <div class="container campaigns-title">
        <span>Campaigns</span>
    </div>
    <div class="campaign-title-container" style="background-image: url(<?= $post->getMeta('top_skinny_banner', true);  ?>)">
        <div class="container">
            <h1><?= $post->getTitle(); ?></h1>
        </div>
    </div>
    <div class="campaign-content-container">
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-sm-4 col-xs-12 campaign-image">
                    <img src="<?= $post->getMeta('logo', true); ?>" alt="" />
                </div>
                <div class="col-sm-8 col-xs-12 campaign-info">
                    <?= apply_filters('the_content', $post->getContent()); ?>
                    <?= ccc_social_share_post($post, ['facebook', 'twitter'], 'socials-btns', [
                            '<a class="campaign-read-more" href="'.$post->getMeta('read_more').'">Read more</a>'
                    ]);?>
                </div>
            </div>
        </div>
    </div>

    <div class="container latest-updates">
        <div class="stories-list story-border-top">
            <div class="badge">Latest updates</div>
        </div>
		<div class="row row-eq-height">
            <?= $campaignCtrl->lastUpdates($postCategories); ?>
        </div>
    </div>

    <div class="sign-up">
        <div class="container">
            <h2>Get involved with this campaign today.</h2>
            <?= $post->getMeta('gisu_form'); ?>
        </div>
    </div>

    <div class="container">
        <div class="col-md-8">
            <div class="stories-list story-border-top">
                <div class="badge">Resources</div>
            </div>
            <ul class="resources-list">
	            <?= $campaignCtrl->relatedResources($post->getId(), 'campaign_project_type'); ?>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="stories-list story-border-top">
                <div class="badge">Get involved</div>
            </div>
            <div class="cover-post" style="background-image: url(<?= $post->getMeta('cp_background', true); ?>)">
                <div class="cp-container" style="background-color: <?= hex2rgba($post->getMeta('cp_background_color'), 0.9); ?>">
                    <h3 class="cpc-title"><?= $post->getMeta('cp_title_heading'); ?></h3>
                    <h4 class="cpc-subtitle"><?= $post->getMeta('cp_sub_heading'); ?></h4>
                    <p class="cpc-excerpt"><?= $post->getMeta('cp_description'); ?></p>
                    <a class="cpc-read-more" href="<?= $post->getMeta('cp_action_url');?>">Read more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container related-campaigns">
        <div class="stories-list story-border-top">
            <div class="badge">Related campaigns</div>
        </div>
        <div class="row">
            <?= $campaignCtrl->topCampaigns($post->getId(), $post->getTitle(), $postCategories); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>