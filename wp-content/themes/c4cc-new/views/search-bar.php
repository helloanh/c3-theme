<?php
$form = new \CCC\Services\FormBuilder();
$taxonomies = $controller->getTaxonomies($cptHomePage);
$taxonomies = array_combine($taxonomies, $taxonomies);

foreach($taxonomies as $key => $value) {
    $taxonomies[$key] = strtoupper(str_replace('_', ' ', $value));
}
?>

<div class="search-bar row">
	<?= $form->open(); ?>
    <div class="col-sm-3">
		<?= $form->select('category', $taxonomies); ?>
    </div>
    <div class="col-sm-6">
		<?= $form->text('search'); ?>
    </div>
    <div class="col-sm-3">
		<?= $form->submit('Search by Keyword'); ?>
    </div>
    <?= $form->close(); ?>
</div>
