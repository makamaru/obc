<?php
/**
 * @package Rookie
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_single() ) { ?><a href="<?php echo esc_url( get_permalink() ); ?>"><?php } ?>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'large' ); ?>
		</div>
	<?php } ?>

	<div class="single-entry">
		<header class="entry-header">
			<?php rookie_entry_title(); ?>

			<div class="entry-details">
				<?php do_action( 'rookie_before_entry_details' ); ?>
				<?php rookie_entry_meta(); ?>
				<?php rookie_entry_date(); ?>
				<?php echo '<span class="posted-on" style="margin-left: 10px;">' ?>
					<?php echo '<span class="dashicons dashicons-format-chat" style="color: #666;"></span>&nbsp;' ?>
					<?php comments_number( '0', '1', '%' ); ?>
				<?php echo '</span>' ?>
				<?php do_action( 'rookie_entry_details' ); ?>
			</div>
		</header><!-- .entry-header -->

		<?php if ( ! is_single() ) { ?></a><?php } ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'rookie' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php rookie_entry_footer(); ?>
	</div>
</article><!-- #post-## -->
