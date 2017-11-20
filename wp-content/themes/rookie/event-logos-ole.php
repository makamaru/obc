<?php
/**
 * Event Logos
 *
 * @author 		ThemeBoy
 * @package 	SportsPress/Templates
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( get_option( 'sportspress_event_show_logos', 'yes' ) === 'no' ) return;

$show_team_names = get_option( 'sportspress_event_logos_show_team_names', 'no' ) === 'yes' ? true : false;
$show_time = get_option( 'sportspress_event_logos_show_time', 'no' ) === 'yes' ? true : false;
$show_results = get_option( 'sportspress_event_logos_show_results', 'no' ) === 'yes' ? true : false;
$abbreviate_teams = get_option( 'sportspress_abbreviate_teams', 'yes' ) === 'yes' ? true : false;

if ( ! isset( $id ) )
	$id = get_the_ID();

if ( $show_results ) {
	$results = sp_get_main_results( $id );
	if ( empty( $results ) ) {
		$show_results = false;
	} else {
		$show_time = false;
	}
}

$teams = get_post_meta( $id, 'sp_team' );
$teams = array_filter( $teams, 'sp_filter_positive' );
if ( $teams ):
	$team_logos = array();
	$i = 0;
	foreach ( $teams as $team ):
		if ( ! has_post_thumbnail( $team ) ) {
			$logo = '';
		} else {
			$logo = get_the_post_thumbnail( $team, 'sportspress-fit-icon' );
		}

		$alt = sizeof( $teams ) == 2 && $i % 2;

		// Add team name
		if ( $show_team_names ) {
			if ( $alt ) {
				$logo .= ' <strong class="sp-team-name">' . sp_get_team_name( $team, $abbreviate_teams ) . '</strong>';
			} else {
				$logo = '<strong class="sp-team-name">' . sp_get_team_name( $team, $abbreviate_teams ) . '</strong> ' . $logo;
			}
		}

		// Add link
		if ( get_option( 'sportspress_link_teams', 'no' ) == 'yes' ) $logo = '<a href="' . get_post_permalink( $team ) . '">' . $logo . '</a>';

		// Add result
		if ( $show_results && ! empty( $results ) ) {
			$team_result = array_shift( $results );
			$team_result = apply_filters( 'sportspress_event_logos_team_result', $team_result, $id, $team );
			if ($team_result > 4) {
				$sp_class_result = 'sp-win';
			} elseif ($team_result < 4) {
				$sp_class_result = 'sp-lose';
			} elseif ($team_result == 4) {
				$sp_class_result = 'sp-draw';
			}
			if ( $alt ) {
				$logo = '<strong class="sp-team-result '.$sp_class_result.'">' . $team_result . '</strong> ' . $logo;
			} else {
				$logo .= ' <strong class="sp-team-result '.$sp_class_result.'">' . $team_result . '</strong>';
			}
		}

		// Add logo to array
		if ( '' !== $logo ) {
			$team_logos[] = '<span class="sp-team-logo">' . $logo . '</span>';
			$i++;
		}
	endforeach;
	$team_logos = array_filter( $team_logos );
	if ( ! empty( $team_logos ) ):
		echo '<div class="sp-template sp-template-event-logos" style="text-align: left; margin: 10px 0 25px 0;"><div class="sp-event-logos sp-event-logos-' . sizeof( $teams ) . '">';

		// Assign delimiter
		if ( $show_time && sizeof( $teams ) <= 2 ) {
			$delimiter = '<strong class="sp-event-logos-time sp-team-result">' . get_the_time( get_option('time_format'), $id ) . '</strong>';
		} else {
			$delimiter = get_option( 'sportspress_event_teams_delimiter', 'vs' );
		}

		echo implode( ' ' . $delimiter . ' ', $team_logos );
		echo '</div></div>';
	endif;
endif;