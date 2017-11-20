<?php
/**
 * @package Rookie
 */
?>


<article id="post-<?php the_ID(); ?>" class="col-sm-12 index-<?= $myQuery->current_post; ?>" 
	style="
	    /*background-color: #99538F;*/
	    /*background-color: #fff;*/
	    background-color: rgba(153, 83, 143, 0.5);
	    border: #99538F solid 2px;
    	border-radius: 5px;
    	padding: 10px 0;
    	margin: 5px 0;
    	display: none;
    	min-height: 230px;
	" >

	<?php if ( ! is_single() ) { ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
	<?php } ?>

	<div class="col-sm-9">
		<header class="">
			<a href="http://localhost/obc/2017/06/07/inscriptions-et-reinscriptions-2/">
				<h2 class="entry-title single-entry-title">
					<?= get_the_title() ?>
				</h2>
			</a>
		</header><!-- .entry-header -->
	</div>

	<div class="col-sm-3">
		<div class="">
			<div class="posted-on" style="width: 100%; margin: 5px 0 0 0; border: none; background: none;">
				<span class="dashicons dashicons-calendar-alt"></span> &nbsp;
				<a href="http://localhost/obc/2017/07/06/challenge-tilagone/" rel="bookmark">
					<time class="entry-date published updated" style="line-height: 24px;" >
						<?= get_the_date('d/m/y'); ?>
					</time>
				</a>
			</div>
		</div>
	</div>


	<div class="col-sm-9 single-entry">

		<div class="entry-content" style="text-align: justify;">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<?php rookie_entry_footer(); ?>
	</div>

	<?php if ( ! is_single() ) { ?>
		</a>
	<?php } ?>

	<div class="col-sm-3 entry-thumbnail">
		<?php the_post_thumbnail('medium'); ?>
	</div>

<!-- 	<div class="col-sm-12">
		<hr style="margin-top: 5px;" />
	</div> -->

</article><!-- #post-## -->


