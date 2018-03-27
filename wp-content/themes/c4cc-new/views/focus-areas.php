<?php
use \CCC\Data\FocusAreas;

$focusAreas = new FocusAreas('focus-areas');
?>

<div class="pane-menu pane-left">
	<h2>Focus Areas</h2>
	<?= $focusAreas->post->get('post_content'); ?>
</div>
<div class="pane-content">
	<?php echo $focusAreas; ?>
</div>
<div class="clearfix"></div>