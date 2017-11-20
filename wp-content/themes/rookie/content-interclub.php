<?php
/**
 * @package Rookie
 */
?>

<?php
	// var_dump($post->post_status);
	// die;
?>

<article id="post-<?php the_ID(); ?>" class="col-md-12 post-ic index-ic-<?= $myQuery->current_post; ?>" 
	style="
	    /*background-color: #99538F;*/
	    /*background-color: #fff;*/
	    /*background-color: rgba(255, 255, 255, 0.5);*/
	    background-color: rgba(246, 247, 249, 1);
	    border: #ddd solid 1px;
    	border-radius: 5px;
    	padding: 10px 0;
    	margin: 5px 0 10px 0;
	" >

	<?php if ( ! is_single() ) { ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
	<?php } ?>

	<div class="col-md-9">
		<header class="">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<h2 class="entry-title single-entry-title">
					<?= get_the_title() ?>
				</h2>
			</a>
		</header><!-- .entry-header -->
	</div>

	<div class="col-md-3">
		<div class="">
			<div class="posted-on" style="width: 100%; margin: 5px 0 0 0; border: none; background: none;">
				<span class="dashicons dashicons-calendar-alt"></span> &nbsp;
				<time class="entry-date published updated" style="line-height: 24px;" >
					<?= get_the_date('d/m/y'); ?>
				</time>
			</div>
		</div>
	</div>


	<div class="col-md-12 single-entry" style="clear: both">

		<div class="entry-content" style="text-align: auto;">

			<?php sp_get_template( 'event-logos-ole.php' ); ?>

			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rookie' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="article-header">
			<span class="posted-on toogleComment" data-comment="<?php the_ID(); ?>" style="margin-right: 10px; cursor: pointer;">
				<span class="dashicons dashicons-testimonial" style="color: #666;"></span>
				&nbsp;<b><?php comments_number( '0', '1', '%' ); ?></b>
				&nbsp;|&nbsp;
				<?php comments_number( 'LAISSER UN COMMENTAIRE', 'VOIR LE COMMENTAIRE', 'VOIR LES COMMENTAIRES' ); ?>
				<span class="dashicons dashicons-arrow-down" style="color: #666;"></span>
			</span>
		</footer>

		<?php rookie_entry_footer(); ?>
	</div>

	<?php if ( ! is_single() ) { ?>
		</a>
	<?php } ?>

	<div class="col-md-12 blocComment-<?php the_ID(); ?>" style="display: none; padding:10px">
		<?php $withcomments = "1"; ?>
		<?php comments_template( '', true ); ?>
	</div>


</article><!-- #post-## -->


