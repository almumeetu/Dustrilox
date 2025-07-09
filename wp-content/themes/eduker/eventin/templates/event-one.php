<?php get_header();
    global $post;
    use \Etn\Utils\Helper;
    $single_event_id = get_the_ID();
    $categories = get_the_terms($single_event_id, 'etn_category');
    $etn_terms = get_the_terms($single_event_id, 'etn_tags');
    $event_options  = get_option("etn_event_options");
    $data = Helper::single_template_options( $single_event_id );

?>


<!-- event area start -->
<section class="event__area p-relative">
    <div class="page__title-shape">
        <img class="page-title-shape-5 d-none d-sm-block" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/page-title-shape-1.png" alt="">
        <img class="page-title-shape-6" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/page-title-shape-2.png" alt="">
        <img class="page-title-shape-7" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/page-title-shape-4.png" alt="">
        <img class="page-title-shape-8" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumb/page-title-shape-5.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-8">
                <div class="event__wrapper">
                    <div class="page__title-content mb-25">
                        <?php if(!empty($categories)) : ?>
                        <span class="breadcrumb__title-pre"><?php echo esc_html($categories[0]->name);?></span>
                        <?php endif; ?>
                        <h5 class="breadcrumb__title-2"><?php the_title(); ?></h5>
                    </div>
                    <div class="course__meta-2 d-sm-flex align-items-center mb-30">
                        <div class="course__teacher-3 d-flex align-items-center mr-70 ">

                           <?php 
                           $etn_event_schedule = get_post_meta( $single_event_id, 'etn_event_schedule', true);
                           if ( !empty($etn_event_schedule) ) :  
                            $etn_schedule_topics = get_post_meta($etn_event_schedule[0], 'etn_schedule_topics', true);
                            $etn_schedule_speakers_ids = $etn_schedule_topics[0]['etn_shedule_speaker'];
                           foreach($etn_schedule_speakers_ids as $speaker): 
                              $speaker_name = get_post_meta($speaker, 'etn_speaker_title', true);
                              $speaker_avatar = get_the_post_thumbnail_url( $speaker, 'thumbnail' );
                              $speaker_url = get_the_permalink($speaker); 
                              if(!empty($speaker_avatar)) : 
                           ?>
                            <div class="course__teacher-thumb-3 mr-15">
                                <img src="<?php echo esc_url($speaker_avatar); ?>" alt="<?php echo esc_attr($speaker_name); ?>">
                            </div>
                            <?php endif; 
                            if(!empty($speaker_name)) : ?>
                            <div class="course__teacher-info-3">
                                <h5><?php echo esc_html__('Speakers', 'eduker'); ?> :</h5>
                                <p><a href="<?php echo esc_url($speaker_url); ?>"><?php echo esc_html($speaker_name); ?></a></p>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php endforeach; endif; ?>



                        <?php if(!isset($event_options["etn_hide_date_from_details"])): ?>
                        <div class="course__update mr-80 ">
                            <h5><?php echo esc_html__('Event Date', 'eduker'); ?> :</h5>
                            <p><?php echo esc_html($data['event_start_date']); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php
                        if( !class_exists('Wpeventin_Pro') || get_post_meta($single_event_id, 'etn_event_location_type', true) != 'new_location' ) :
                              if ( !isset($event_options["etn_hide_location_from_details"]) && !empty($data['etn_event_location'])) ;

                              $location = '';
                              $loc_arr = $data['etn_event_location'];
                              if(!empty(is_array($loc_arr) || is_object($loc_arr))) : 
                              foreach ($loc_arr as $key => $loc) {
                                if ( $key == 'address' ) {
                                  $location .= $loc;
                                } elseif ( $key == 'custom_url' ) {
                                    $location .= $loc;
                                }
                              }
                              endif; 

                        if( !empty($location) ) :
                            
                        ?>
                        <div class="course__update ">
                           <h5><?php echo esc_html__('Location', 'eduker'); ?> :</h5>
                            <p><?php echo esc_html($location);  ?></p>
                        </div>

                        
                        <?php endif; endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- event area end -->
 
<!-- event details area start -->
<section class="event__area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="event_wrapper">
                     <?php if(has_post_thumbnail()) : ?>
                    <div class="event__thumb mb-35 w-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="event__details mb-35">
                        <p><?php the_content(); ?></p>
                    </div>

                    <?php if($etn_terms) : ?>
                    <div class="event__tag">
                        <span><i class="fal fa-tag"></i></span>
                        <?php 
                        $tag_list = array();
                        if( is_array( $etn_terms ) ){
                           foreach ($etn_terms as $quitox_etn_term) {
                              $tag_name = $quitox_etn_term->name;
                              $tag_url = get_term_link($quitox_etn_term->slug, 'etn_tags');

                              $tag_list[] = '<a href="'.$tag_url.'">'.$tag_name.'</a>';

                           }
                        }
                        echo tp_kses( join(', ', $tag_list) );
                        ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="event__sidebar pl-70">
                   
                     <div class="event__sidebar-shape">
                           <img class="event-sidebar-img-2" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/events/event-shape-2.png" alt="">
                           <img class="event-sidebar-img-3" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/events/event-shape-3.png" alt="">
                     </div>

                     <?php do_action("etn_before_single_event_meta", $single_event_id); ?>

                     <!-- event schedule meta end -->
                     <?php do_action("etn_single_event_meta", $single_event_id); ?>
                     <!-- event schedule meta end -->

                     <?php do_action("etn_after_single_event_meta", $single_event_id); ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- event details area end -->


<?php get_footer();