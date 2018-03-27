<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()): $i=1; ?>
<div id="related">
	<h3>Related Blogs</h3> <!-- tf modified 11-26-13: "Related Stories" to Related Blogs -->
	<ul>
		<?php while (have_posts()) : the_post(); ?>
			<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'related', false, '' ); ?>
			<li class="block<?php echo $i; ?>" style="background: url('<?php echo $src[0]; ?>') no-repeat">
				<div class="date"><?php the_time('j.F.y'); ?></div>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</li>
			<?php $i++; ?>
		<?php endwhile; ?>
	</ul>
	<br class="clear" />
</div>
<?php endif; ?>
