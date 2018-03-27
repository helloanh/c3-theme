<?php
get_header();

$post = \CCC\Services\PostQuery::current();
$cptHomePage = $post->get('metas')->get('home_for_cpt');

$searchBar = false;
$controllerName = "CCC\Data\\" . ucfirst($cptHomePage);

if($cptHomePage && class_exists($controllerName)) {
	$controller     = new $controllerName();
	$searchBar      = $controller->hasSearchBar();
	$html           = $controller;
	$html           .= $controller->pagination();
}
else {
	$html = include 'views/default-page.php';
}
?>

<div id="<?= $cptHomePage; ?>" class="body-container container">

    <?php if($searchBar !== false) include 'views/search-bar.php'; ?>

    <div class="row">
	    <?= $html ?>
    </div>

</div>

<?php get_footer(); ?>