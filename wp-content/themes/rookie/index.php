<?php

wp_enqueue_script( 'bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, true);
wp_enqueue_style( 'bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rookie
 */

get_header(); ?>

	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-6" style="padding:20px;">
				<h2 class="col-md-12" style="margin-bottom: 0; padding-left: 0;"><span style="color: #99538F">BREAKING</span> NEWS</h2>
				<?php
					$args = array(
					    'post_type' => 'post',
					    'category_name' => 'infos-importantes',
					    'posts_per_page' => 3,
					);
					$myQuery = new WP_Query($args);
				?>

				<?php if ( $myQuery->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
						<?php include(locate_template('content-important.php', false, false)); ?>
					<?php endwhile; ?>

					<div class="col-md-12" style="padding-left: 0">
					    <div class="nav-dots">
      						<label class="nav-dot active" id="dot-0"></label>
      						<label class="nav-dot" id="dot-1"></label>
      						<label class="nav-dot" id="dot-2"></label>
      					</div>
  					</div>

					<?php // rookie_paging_nav(); ?>
				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

				<h2 class="col-md-12" style="margin-bottom: 0; padding: 10px 0 0 0;"><span style="color: #99538F">P</span>hotos</h2>
				<div class="col-md-12" style="padding: 5px 0">
					<?php wd_slider(2); ?>
				</div>
			
				<h2 class="col-md-12" style="margin-bottom: 5px; padding: 10px 0 0 0;"><span style="color: #99538F">INTER</span>CLUBS</h2>
				<?php
					$args = array(
					    'post_type' => 'sp_event',
					    'post_status' => 'publish',
					    // 'category_name' => 'infos-importantes',
					    'posts_per_page' => 4,
					);
					$myQuery = new WP_Query($args);
				?>

				<?php if ( $myQuery->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $myQuery->have_posts() ) : $myQuery->the_post(); ?>
						<?php include(locate_template('content-interclub.php', false, false)); ?>
					<?php endwhile; ?>

					<?php // rookie_paging_nav(); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6" style="padding:20px;">
				<main id="main" class="site-main" role="main">
					<h2 class="col-md-12" style="margin-bottom: 5px; padding-left: 0;"><span style="color: #99538F">FB</span> NEWS</h2>
					<?php include(locate_template('content-fb.php', false, false)); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="row">
			<div class="col-md-4" style="padding: 20px;">
				<h2 class="col-md-12" style="margin-bottom: 5px; padding-left: 0;">Prochaines rencontres</h2>
				<?= do_shortcode('[event_blocks id="99" status="future" number="3" show_all_events_link="1"]') ?>
			</div>
			<div class="col-md-4 bloc-homepage" style="padding: 20px;">
				<h2 class="col-md-12" style="margin-bottom: 5px; padding-left: 0;">Calendrier</h2>
				<?= do_shortcode('[event_calendar 99]') ?>
			</div>
			<div class="col-md-4" style="padding: 20px;">
				<h2 class="col-md-12" style="margin-bottom: 5px; padding-left: 0;">Liens Utiles</h2>
				<div class="col-md-12">
					<ul style="margin-left: 15px">
					  <li><a href="http://www.ffbad.org/" target="_blank">Fédération Française de Badminton</a></li>
					  <li><a href="http://www.badminton-paysdelaloire.fr/" target="_blank">Ligue des Pays de la Loire</a></li>
					  <li><a href="http://www.codep44-badminton.fr/" target="_blank">Comité Départemental 44</a></li>
					  <li><a href="http://www.orvault.fr/" target="_blank">La ville d'Orvault</a></li>
					  <li><a href="http://badiste.fr/" target="_blank">Badiste</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>



<?php get_footer(); ?>
