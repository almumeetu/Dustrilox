
<?php 
        global $post; $post_id = $post->ID;
        $course_id = $post_id;
        $user_id   = get_current_user_id();
        $current_id = $post->ID;

        $enable_video = get_post_meta( $post->ID, '_learndash_course_grid_enable_video_preview', true );
        $embed_code   = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true );

        // Retrive oembed HTML if URL provided
        if ( preg_match( '/^http/', $embed_code ) ) {
            $embed_code = wp_oembed_get( $embed_code, array( 'height' => 600, 'width' => 400 ) );
        }



        $options = get_option('sfwd_cpt_options');
        $currency = null;

        if ( ! is_null( $options ) ) {
            if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
            $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];
        }

        if( is_null( $currency ) )
            $currency = 'USD';

        $course_options = get_post_meta($post_id, "_sfwd-courses", true);
        $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : esc_html__( 'Free', 'eduker' );

        $has_access   = sfwd_lms_has_access( $course_id, $user_id );
        $is_completed = learndash_course_completed( $user_id, $course_id );

        if( $price == '' )
            $price .= esc_html__( 'Free', 'eduker' );

        if ( is_numeric( $price ) ) {
            if ( $currency == "USD" )
                $price = '$' . $price;
            else
                $price .= ' ' . $currency;
        }

        $class       = '';
        $ribbon_text = '';

        if ( $has_access && ! $is_completed ) {
            $class = 'ld_course_grid_price ribbon-enrolled';
            $ribbon_text = esc_html__( 'Enrolled', 'eduker' );
        } elseif ( $has_access && $is_completed ) {
            $class = 'ld_course_grid_price';
            $ribbon_text = esc_html__( 'Completed', 'eduker' );
        } else {
            $class = ! empty( $course_options['sfwd-courses_course_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
            $ribbon_text = $price;
        }

?>





        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-wrapper">
                <div class="entry-content">
                    <?php
                    the_content( sprintf(
                        esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eduker' ),
                        get_the_title()
                    ) );
                    ?>
                </div><!-- .entry-content -->
            </div>
        </article>
