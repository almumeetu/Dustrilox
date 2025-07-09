<?php
       
       global $post; $post_id = $post->ID;
       $course_id = $post_id;
       $user_id   = get_current_user_id();
       $current_id = $post->ID;

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


       $terms = get_the_terms( $post->ID, 'ld_course_category' );
       $cat_with_link = '';
       $cat_with_link = eduker_ld_course_cageory_by_id($post->ID, 'ld_course_category');
       ?>

      <li>
        <div class="course__sm d-flex align-items-center mb-30">
           <?php if ( has_post_thumbnail() ):?>
           <div class="course__sm-thumb mr-20">
              <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail();?>
              </a>
           </div>
           <?php endif; ?>
           <div class="course__sm-content">
              <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <div class="course__sm-price">
                 <span><?php echo esc_html($ribbon_text); ?></span>
              </div>
           </div>
        </div>
     </li>

 <?php 