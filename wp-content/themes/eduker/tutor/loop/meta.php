<?php
/**
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

global $post, $authordata;

$profile_url = tutor_utils()->profile_url( $authordata->ID, true );
$course_duration = get_tutor_course_duration_context( get_the_ID(), true );
$course_students = tutor_utils()->count_enrolled_users_by_course();

?>


<div class="course__bottom-2 d-flex align-items-center justify-content-between">
     <div class="course__action">
        <ul>
           <?php if ( tutor_utils()->get_option( 'enable_course_total_enrolled' ) ) : ?>
           <li>
              <div class="course__action-item d-flex align-items-center">
                 <div class="course__action-icon mr-5">
                    <span>
                       <i class="far fa-user"></i>
                    </span>
                 </div>
                 <div class="course__action-content">
                    <span><?php echo esc_html( $course_students ); ?></span>
                 </div>
              </div>
           </li>
           <?php endif; ?>

           <?php if(!empty($course_duration)) : ?>
           <li>
              <div class="course__action-item d-flex align-items-center">
                 <div class="course__action-icon mr-5">
                    <span>
                       <i class="far fa-book-alt"></i>
                    </span>
                 </div>
                 <div class="course__action-content">
                    <span><?php echo wp_kses_post( $course_duration ); ?></span>
                 </div>
              </div>
           </li>
           <?php endif; ?>

           <li>
              <div class="course__action-item d-flex align-items-center">
                 <div class="course__action-icon mr-5">
                    <span>
                       <i class="far fa-star"></i>
                    </span>
                 </div>
                 <div class="course__action-content">
                    <?php
                        $course_rating = tutor_utils()->get_course_rating();
                    ?>
                    <span>
                        <?php
                            if ($course_rating->rating_avg >= 0) {
                                echo apply_filters('tutor_course_rating_average', $course_rating->rating_avg) . '';

                                echo '<span class="rating-count-gap">(' . apply_filters('tutor_course_rating_count', $course_rating->rating_count) . ') </span>';
                            }
                        ?> 
                    </span>
                 </div>
              </div>
           </li>
        </ul>
     </div>
     <div class="course__tutor-2">
        <a href="<?php echo esc_url($profile_url); ?>">
           <?php echo get_avatar(get_the_author_meta('ID'), 32) ?>
        </a>
     </div>
</div>





<div class="list-item-meta tutor-fs-7 tutor-fw-medium tutor-color-black tutor-d-flex tutor-mt-12 tutor-mb-32 d-none">
    <?php
        $course_duration = get_tutor_course_duration_context( get_the_ID(), true );
        $course_students = tutor_utils()->count_enrolled_users_by_course();
    ?>
    <?php
        if(!empty($course_duration)) { 
    ?>
    <div class="tutor-d-flex tutor-align-items-center">
        <span class="meta-icon tutor-icon-clock-filled tutor-color-muted"></span>
        <span><?php echo wp_kses_post( $course_duration ); ?></span>
    </div>
    <?php } ?>
    <?php if ( tutor_utils()->get_option( 'enable_course_total_enrolled' ) ) : ?>
    <div class="tutor-d-flex tutor-align-items-center">
        <span class="meta-icon tutor-icon-user-filled tutor-color-muted"></span>
        <span><?php echo esc_html( $course_students ); ?></span>
    </div>
    <?php endif; ?>
</div>

<div class="list-item-author tutor-d-flex tutor-align-items-center tutor-mt-auto d-none">
	<div class="tutor-avatar">
		<a href="<?php echo esc_url($profile_url); ?>"> <?php echo tutor_utils()->get_tutor_avatar($post->post_author); ?></a>
	</div>
	<div class="tutor-course-meta tutor-fs-7 tutor-color-black-60">
        <span class="tutor-course-meta-name">
            <?php esc_html_e('By', 'eduker') ?>
            <span class="tutor-fs-7 tutor-fw-medium tutor-color-black">
                <?php echo esc_html(get_the_author()); ?>
            </span>
        </span>
        <span class="tutor-course-meta-cat">
            <?php
                $course_categories = get_tutor_course_categories();
                if(!empty($course_categories) && is_array($course_categories ) && count($course_categories)){
            ?>
            <?php esc_html_e('In', 'eduker') ?>
            <span class="tutor-fs-7 tutor-fw-medium course-category tutor-color-black">
                <?php
                    foreach ($course_categories as $course_category){
                        $category_name = $course_category->name;
                        $category_link = get_term_link($course_category->term_id);
                        echo wp_kses_post("<a href='$category_link'>$category_name </a>");
                    }
                }
                ?>
            </span>
        </span>
	</div>
</div>
