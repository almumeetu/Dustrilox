<?php 

	/**
	 * Template part for displaying header layout two
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package eduker
	*/

	// info
    $eduker_topbar_switch = get_theme_mod( 'eduker_topbar_switch', false );
    $eduker_mail_id = get_theme_mod( 'eduker_mail_id', __( 'info@educal.com', 'eduker' ) );
    $eduker_address = get_theme_mod( 'eduker_address', __( 'Moon ave, New York, 2020 NY US', 'eduker' ) );
    $eduker_address_url = get_theme_mod( 'eduker_address_url', __( 'https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'eduker' ) );

    // contact button
	$eduker_button_text = get_theme_mod( 'eduker_button_text', __( 'Contact Us', 'eduker' ) );
    $eduker_button_link = get_theme_mod( 'eduker_button_link', __( '#', 'eduker' ) );

    // acc button
	$eduker_acc_button_text = get_theme_mod( 'eduker_acc_button_text', __( 'Login', 'eduker' ) );
    $eduker_acc_button_link = get_theme_mod( 'eduker_acc_button_link', __( '#', 'eduker' ) );

    // header right
    $eduker_search = get_theme_mod( 'eduker_search', false );
    $eduker_header_right = get_theme_mod( 'eduker_header_right', false );
    $eduker_menu_col = $eduker_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';

?>


<header>
   <div id="header-sticky" class="header__area header__transparent">
      <div class="header__bottom">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-xxl-8 col-xl-9 col-lg-10 col-md-6 col-6">
                  <div class="header__bottom-left d-flex align-items-center">
                     <div class="logo">
                        <?php eduker_header_logo();?>
                     </div>
                     <div class="main-menu main-menu-2 main-menu-border ml-30 pl-30">
                        <nav id="mobile-menu">
                           <?php eduker_header_menu();?>
                        </nav>
                     </div>
                  </div>
               </div>
               <?php if ( !empty( $eduker_header_right ) ): ?>
               <div class="col-xxl-4 col-xl-3 col-lg-2 col-md-6 col-6">
                  <div class="header__bottom-right d-flex justify-content-end align-items-center pl-30">
                     <?php if ( !empty( $eduker_acc_button_link ) ): ?>
                     <div class="header__action d-none d-xl-block">
                        <ul>
                           <li>
                              <a href="<?php echo esc_html($eduker_acc_button_link); ?>">
                                 <svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M7.1466 8.96416C7.05493 8.95499 6.94493 8.95499 6.8441 8.96416C4.66243 8.89083 2.92993 7.10333 2.92993 4.90333C2.92993 2.65749 4.74493 0.833328 6.99993 0.833328C9.24576 0.833328 11.0699 2.65749 11.0699 4.90333C11.0608 7.10333 9.32826 8.89083 7.1466 8.96416Z" stroke="#0C140F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M2.56341 12.3467C0.345075 13.8317 0.345075 16.2517 2.56341 17.7275C5.08424 19.4142 9.21841 19.4142 11.7392 17.7275C13.9576 16.2425 13.9576 13.8225 11.7392 12.3467C9.22758 10.6692 5.09341 10.6692 2.56341 12.3467Z" stroke="#0C140F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <?php endif; ?>  

                     <?php if ( !empty( $eduker_search ) ): ?>  
                     <div class="header__search header__search-2 d-none d-xl-block">
                        <form action="<?php print esc_url( home_url( '/' ) );?>">
                           <div class="header__search-input">
                              <input type="text" name="s" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr__( 'Search...', 'eduker' );?>">
                              <button class="header__search-btn" type="submit">
                                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="#3E8454" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17 17L13.1333 13.1333" stroke="#3E8454" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </button>
                           </div>
                        </form>
                     </div>
                     <?php endif; ?> 
                     <div class="header__hamburger ml-50 d-xl-none">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#offcanvasmodal" class="hamurger-btn">
                           <span></span>
                           <span></span>
                           <span></span>
                        </button>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</header>


<?php get_template_part( 'template-parts/header/header-side-info' ); ?>