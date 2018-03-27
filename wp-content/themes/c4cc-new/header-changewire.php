<?php
global $hub;
global $hubConfig;
$hub = new \CCC\Data\ChangeWire();
$hubConfig = $hub->getConfig();
//retrieve the post ID from Post/Page Title
$page    = get_page_by_title( 'Change Wire' );
$page_id = $page->ID;

function filterElementIsChecked( $slug, $query_slug ) {
    if ( isset( $_GET[ $query_slug ] ) && $_GET[ $query_slug ] == $slug ) {
        $checked    = 'checked';
        $labelClass = 'class="label-checked"';
    } elseif ( ! isset( $_GET[ $query_slug ] ) && $slug == 'all' ) {
        $checked    = 'checked';
        $labelClass = 'class="label-checked"';
    } else {
        $checked = $labelClass = null;
    }
    return [
        'checked'    => $checked,
        'labelClass' => $labelClass
    ];
}
?>
<!doctype html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( ': We\'re wired for change', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    <script type="text/javascript">
        var ajax_url = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
    </script>
    <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1874463536175540'); // Insert your pixel ID here.
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1874463536175540&ev=PageView&noscript=1"
        /></noscript>
        <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
</head>
<body>
<div class="hero-header"
     style="background-image: url(<?php the_field( 'hub_join_us_background', '' . $page_id . '' ); ?>)">
    <h1><?php the_field( 'hub_logo', '' . $page_id . '' ); ?></h1>
    <h2><?php the_field( 'hub_headline_text', '' . $page_id . '' ); ?></h2>
    <ul>
        <li><a href="<?= get_site_url(); ?>">CCC</a></li>
        <li><a href="http://cccaction.org">CCCA</a></li>
    </ul>
</div>
<nav class="navbar navbar-default navbar-hub">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggleMe"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="toggleMe">
            <?php
            wp_nav_menu( array(
                'menu'       => 'hub_menu',
                'depth'      => 2,
                'container'  => false,
                'menu_class' => 'nav navbar-nav navbar-left',
                'walker'     => new wp_bootstrap_navwalker()
            ) );
            ?>
        </div>
    </div>
</nav>
<div id="filter-container">
    <button id="filter-close"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="container">
        <div class="row">
            <form action="">
                <div class="col-sm-5 filter-categories">
                    <ul>
                        <?php
                        $categories_filter = ccc_get_categories_filter();
                        foreach ( $categories_filter as $slug => $name ) {
                            $result = filterElementIsChecked( $slug, 'filter_category' );
                            echo '<div class="radio">
                            <label ' . $result['labelClass'] . '>
                                <input type="radio" name="category_name" id="" value="' . $slug . '" ' . $result['checked'] . '>
                                ' . $name . '
                            </label>
                        </div>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-sm-7">
                    <div class="form-group search-field">
                        <input type="text" name="s" class="form-control" placeholder="Search by Keyword"/>
                        <button type="submit" class="filterSubmit">FILTER</button>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 filter-label">
                            <div>Tags</div>
                        </div>
                        <div class="col-sm-9 filter-tags">
                            <div class="form-inline">
                                <?php
                                $ccc_tags = [
                                    (object) [
                                        'slug' => null,
                                        'name' => 'See all'
                                    ]
                                ];
                                $ccc_tags += get_tags();
                                foreach ( $ccc_tags as $tag ) {
                                    $result = filterElementIsChecked( $tag->term_id, 'filter_tag' );
                                    ?>
                                    <div class="radio">
                                        <label <?= $result['labelClass']; ?>>
                                            <input type="radio" name="tag" id=""
                                                   value="<?= $tag->term_id; ?>" <?= $result['checked']; ?>>
                                            <?= $tag->name; ?>
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>