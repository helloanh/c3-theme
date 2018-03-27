<!doctype html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( 'Center for Community Change', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    <script type="text/javascript">
        var ajax_url = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
    </script>
    <style>
        .header .nav .dropdown-submenu { position: relative; } .header .nav .dropdown-submenu > a:after{ content: '\e258'; font-family: 'Glyphicons Halflings'; position: absolute; right: 10px; } .header .nav .dropdown-submenu .dropdown-menu { display: none; top: 0; left: 100%; padding-top: 0!important; padding-bottom: 0!important;}
    </style>
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
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggleMe" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="logo" class="navbar-brand" href="<?php bloginfo('url')?>">
                <img src="<?= asset('images/logo.png'); ?>" class="img-responsive" alt="">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="toggleMe">
            <?php /* Primary navigation */
            wp_nav_menu(array(
                'menu'       => 'top_menu',
                'depth'      => 5,
                'container'  => false,
                'menu_class' => 'nav navbar-nav navbar-right',
                'walker'     => new wp_bootstrap_navwalker()
            ));
            ?>
            <?php ccc_get_search_form() ?>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
