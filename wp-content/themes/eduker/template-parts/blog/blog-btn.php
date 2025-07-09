<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eduker
 */

$eduker_blog_btn = get_theme_mod( 'eduker_blog_btn', 'Read More' );
$eduker_blog_btn_switch = get_theme_mod( 'eduker_blog_btn_switch', true );

?>

<?php if ( !empty( $eduker_blog_btn_switch ) ): ?>
<div class="postbox__read-more">
    <a href="<?php the_permalink();?>" class="tp-btn"><?php print esc_html( $eduker_blog_btn );?></a>
</div>
<?php endif;?>