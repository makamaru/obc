<?php
/**
 * @package Rookie
 */
?>

<!-- jquery  -->
<?php wp_enqueue_script( 'jquery'); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( get_the_post_thumbnail() ) { ?>
		<a class="article-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
	<?php } ?>

	<div class="single-article">
		<header class="article-header">

			<?php if ( 'post' == get_post_type() || 'sp_event' == get_post_type() ) : ?>
				<div class="article-details">
					<?php do_action( 'rookie_before_article_details' ); ?>
					<?php echo '<span class="posted-on" style="margin-right: 10px;">' ?>
						<?php if ( get_post_type() == 'post' ) : ?>
							ACTU
						<?php elseif ( get_post_type() == 'sp_event' ) : ?>
							INTERCLUB
						<?php endif; ?>
					<?php echo '</span>' ?>
					<?php rookie_entry_date(); ?>
					<?php do_action( 'rookie_article_details' ); ?>
				</div>
			<?php endif; ?>

			
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header><!-- .article-header -->

		<div class="entry-content article-content">

			<?php if ( get_post_type() == 'sp_event' ) : ?>
				<?php // var_dump( get_post_meta($post->ID, "sp_results") ); ?>
				<?php sp_get_template( 'event-logos.php' ); ?>
			<?php endif; ?>

			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rookie' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'rookie' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="article-header">
			<span class="posted-on toogleComment" data-comment="<?php the_ID(); ?>" style="margin-right: 10px;">
				<span class="dashicons dashicons-testimonial" style="color: #666;"></span>
				&nbsp;<b><?php comments_number( '0', '1', '%' ); ?></b>
				&nbsp;|&nbsp;
				<?php comments_number( 'LAISSER UN COMMENTAIRE', 'VOIR LE COMMENTAIRE', 'VOIR LES COMMENTAIRES' ); ?>
				<span class="dashicons dashicons-arrow-down" style="color: #666;"></span>
			</span>
		</footer>

		<?php rookie_entry_footer(); ?>
	</div>
</article><!-- #post-## -->