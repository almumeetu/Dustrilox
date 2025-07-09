<?php
/**
 * Course Loop End
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shortcode_arg = isset($GLOBALS['tutor_shortcode_arg']) ? $GLOBALS['tutor_shortcode_arg']['column_per_row'] : null;
$courseCols = $shortcode_arg===null ? tutor_utils()->get_option( 'courses_col_per_row', 3 ) : $shortcode_arg;
?>
<div class="<?php if ($courseCols !== 2) { echo esc_html(" course__item-2 transition-3 white-bg mb-30 fix"); } else{ echo "course__item-2 transition-3 white-bg mb-30 fix"; } ?>">
