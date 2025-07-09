<?php
defined( 'ABSPATH' ) || die();

?>
<div class="etn-row etn-justify-content-center etn-pagination-wrapper">
    <?php do_action( 'etn_before_event_archive_pagination_content' );?>
    <?php
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => esc_html__('Previous', 'eduker'),
            'next_text' => esc_html__('Next', 'eduker'),
        ));
    ?>
    <?php do_action( 'etn_after_event_archive_pagination_content' );?>
</div>