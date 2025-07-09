<?php

use \Etn\Utils\Helper;

defined( 'ABSPATH' ) || exit;
?>
<div class="events__tag">
    <?php
    global $post;
    $etn_terms = wp_get_post_terms($single_event_id, 'etn_tags');
    if ($etn_terms) {
        ?>
        <span><i class="fal fa-tag"></i></span>
        <?php
        $output = array();

        if( is_array( $etn_terms ) ){
            foreach ($etn_terms as $term) {
                $term_link =  get_term_link($term->slug, 'etn_tags');
                $output[] = '<a href="' . $term_link . '">' . $term->name . '</a>';
            }
        }
        echo Helper::kses( join(', ', $output) );
    }
    ?>
</div>