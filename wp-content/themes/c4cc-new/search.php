<?php get_header(); ?>
	<div id="hub">
		<div class="container">
			<?php  if ( have_posts() ) : ?>
				<div class="search-title">
					<h2>Search Result</h2>
				</div>
				<div class="row">
					<?php while ( have_posts() ) : the_post(); $post = new \CCC\Services\SinglePost(get_post()); ?>
						<div class="col-sm-4 col-xs-12">
							<div class="cover-post cp-not-full" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7) ), url(<?= $post->getImage(); ?>)">
								<div class="cp-container">
									<div class="cpc-metas cp-metas-bg">
										<?php foreach($post->getCategory() as $title => $link): ?>
											<a href="<?= $link; ?>"><?= $title; ?></a>
										<?php endforeach; ?>
									</div>
									<h3 class="cpc-title">
										<a href="<?= $post->getPermalink(); ?>"><?= $post->getTitle(); ?></a>
									</h3>
									<p class="cpc-excerpt"><?= $post->getExcerpt(); ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
					<div class="pagination index">
						<?php
						$olderEntries = get_next_posts_link( 'Older Entries' );
						$newerEntries = get_previous_posts_link( 'Newer Entries' );
						?>
						<?php if($olderEntries): ?>
						<div class="alignleft"><?= $olderEntries; ?></div>
						<?php endif; if($newerEntries): ?>
						<div class="alignright"><?= $newerEntries; ?></div>
						<?php endif; ?>
					</div><!--end navigation-->
				</div>
			<?php else : ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>