<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package eduker
   */

    $eduker_side_hide = get_theme_mod( 'eduker_side_hide', false );
    $eduker_search = get_theme_mod( 'eduker_search', false );
    $eduker_side_logo = get_theme_mod( 'eduker_side_logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );
    $eduker_extra_about_text = get_theme_mod( 'eduker_extra_about_text', __( 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore', 'eduker' ) );

    $eduker_extra_map = get_theme_mod( 'eduker_extra_map', __( '#', 'eduker' ) );
    $eduker_contact_title = get_theme_mod( 'eduker_contact_title', __( 'Contact Info', 'eduker' ) );
    $eduker_extra_address = get_theme_mod( 'eduker_extra_address', __( '12/A, Mirnada City Tower, NYC', 'eduker' ) );
    $eduker_extra_phone = get_theme_mod( 'eduker_extra_phone', __( '088889797697', 'eduker' ) );
    $eduker_extra_email = get_theme_mod( 'eduker_extra_email', __( 'support@mail.com ', 'eduker' ) );
?>

<!-- offcanvas area start -->
<div class="offcanvas__area">
   <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
              <div class="offcanvas__wrapper">
                 <div class="offcanvas__content">
                    <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                       <?php if ( !empty( $eduker_side_logo ) ): ?>
                       <div class="offcanvas__logo logo">
                          <a href="<?php print esc_url( home_url( '/' ) );?>">
                          <img src="<?php print esc_url($eduker_side_logo); ?>" alt="<?php echo esc_attr__('logo','eduker'); ?>">
                          </a>
                       </div>
                       <?php endif;?>
                       
                       <div class="offcanvas__close">
                          <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                             <i class="fal fa-times"></i>
                          </button>
                       </div>

                    </div>

                    <?php if ( !empty( $eduker_search ) ): ?>
                    <div class="offcanvas__search mb-25">
                       <form action="<?php print esc_url( home_url( '/' ) );?>">
                          <input type="text" name="s" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr__( 'What are you searching for?', 'eduker' );?>">
                          <button type="submit" ><i class="far fa-search"></i></button>
                       </form>
                    </div>
                    <?php endif;?>

                    <div class="mobile-menu fix"></div>


                    <?php if ( !empty( $eduker_side_hide ) ): ?>
                    <?php if ( !empty( $eduker_extra_about_text ) ): ?>
                    <div class="offcanvas__text d-none d-lg-block">
                       <p><?php echo esc_html($eduker_extra_about_text); ?></p>
                    </div>
                    <?php endif;?>

                    <?php if ( !empty( $eduker_extra_map ) ): ?>
                    <div class="offcanvas__map d-none d-lg-block mb-15">
                        <iframe src="<?php echo eduker_kses($eduker_extra_map); ?>"></iframe>
                    </div>
                    <?php endif;?>

                    <div class="offcanvas__contact mt-30 mb-20">
                     <?php if ( !empty( $eduker_contact_title ) ): ?>
                       <h4><?php echo esc_html($eduker_contact_title); ?></h4>
                     <?php endif;?>
                       <ul>
                        <?php if ( !empty( $eduker_extra_address ) ): ?>
                          <li class="d-flex align-items-center">
                             <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-map-marker-alt"></i>
                             </div>
                             <div class="offcanvas__contact-text">
                                <?php echo eduker_kses($eduker_extra_address); ?>
                             </div>
                          </li>
                          <?php endif;?>
                          <?php if ( !empty( $eduker_extra_phone ) ): ?>
                          <li class="d-flex align-items-center">
                             <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                             </div>
                             <div class="offcanvas__contact-text">
                                <?php echo eduker_kses($eduker_extra_phone); ?>
                             </div>
                          </li>
                          <?php endif;?>
                          <?php if ( !empty( $eduker_extra_email ) ): ?>
                          <li class="d-flex align-items-center">
                             <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                             </div>
                             <div class="offcanvas__contact-text">
                                <?php echo eduker_kses($eduker_extra_email); ?>
                             </div>
                          </li>
                          <?php endif;?>
                       </ul>
                    </div>

                    <div class="offcanvas__social">
                       <?php eduker_header_social_profiles(); ?>
                    </div>

                    <?php endif;?>
                 </div>
              </div>
           </div>
       </div>
   </div>
</div>
<!-- offcanvas area end -->      
<div class="body-overlay"></div>
<!-- offcanvas area end -->