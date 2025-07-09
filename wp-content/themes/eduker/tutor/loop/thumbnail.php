<?php

/**
 * Display loop thumbnail
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

$tutor_course_img = get_tutor_course_thumbnail_src();
$placeholder_img = tutor()->url . 'assets/images/placeholder.png';
?>

<div class="course__thumb-2 w-img fix">
    <a href="<?php the_permalink(); ?>">
        <div class="tp-course-listing-thumbnail">
            <img src="<?php echo empty(esc_url($tutor_course_img)) ? $placeholder_img : esc_url($tutor_course_img) ?>" alt="<?php the_title(); ?>">  
        </div>
    </a>
</div>