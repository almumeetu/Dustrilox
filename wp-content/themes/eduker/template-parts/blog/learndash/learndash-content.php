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
       $cat = '';
       $cat_with_link = ''; 
       $cat_with_link = eduker_ld_course_cageory_by_id($post->ID, 'ld_course_category');

       // lesson
       $lesson = learndash_get_course_steps( $post->ID, array('sfwd-lessons') );
       ?>

      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 grid-item cat1 cat2 cat4">
         <div class="course__item white-bg mb-30 fix">
            <div class="course__thumb w-img p-relative fix">
               <a href="<?php the_permalink(); ?>">
                   <?php the_post_thumbnail();?>
               </a>
               <div class="course__tag">
                  <?php echo eduker_kses($cat_with_link);?> 
               </div>
            </div>
            <div class="course__content">
               <div class="course__meta d-flex align-items-center justify-content-between">
                  <div class="course__lesson">
                     <span><i class="far fa-book-alt"></i><?php echo count($lesson); ?> <?php echo esc_html__("Lessons","eduker");?></span>
                  </div>
               </div>
               <h3 class="course__title">
                  <a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a>
               </h3>
               <div class="course__teacher d-flex align-items-center">
                  <div class="course__teacher-thumb mr-15">
                     <?php echo get_avatar(get_the_author_meta('ID'), 50) ?>
                  </div>
                  <h6><?php echo get_the_author_meta('display_name', get_the_author_meta('ID')); ?></h6>
               </div>
            </div>
            <div class="course__more d-flex justify-content-between align-items-center">
               <div class="course__status">
                  <span><?php echo esc_html($ribbon_text); ?></span>
               </div>
               <div class="course__btn">
                  <a href="<?php the_permalink(); ?>" class="link-btn">
                     <?php echo esc_html__("Know Details","eduker");?>
                     <i class="far fa-arrow-right"></i>
                     <i class="far fa-arrow-right"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
 <?php 