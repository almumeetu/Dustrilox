<?php
defined( 'ABSPATH' ) || exit;
use Etn\Utils\Helper as helper;

//include the template functions
\Etn\Utils\Helper::etn_template_include();
?>

<?php do_action( 'etn_before_event_archive_container' ); ?>

<div class="main-event-archive pt-100 pb-100">
    <div class="etn-advanced-search-form">
        <div class="etn-container">
            <?php helper::get_event_search_form(); ?>
            <div class="etn-loader"></div>
        </div>
    </div>

    <div class="etn-event-archive-wrap etn_search_item_container" data-json='<?php echo json_encode([
            "error_content" => [
                "title" => esc_html__('Nothing found!', 'eduker'),
                "exerpt" => esc_html__('It looks like nothing was found here. Maybe try a search?','eduker')
            ]
        ]); ?>'>
        <div class="etn-container">
            <div class="etn-row etn-event-wrapper">

                <?php do_action( 'etn_before_event_archive_item' ); ?>
                <?php
                // Set up custom query parameters
                $paged      = get_query_var('paged') ? get_query_var('paged') : 1;
                $per_page   = intval( etn_get_option('events_per_page') );
                $per_page   = !empty( $per_page ) ?  $per_page : 10;
                $args = array(
                    'post_type'      => 'etn',  
                    'posts_per_page' => $per_page,      
                    'paged'          => $paged,
                );
                
                if ( is_search( ) || is_main_query( ) ) {

                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();

                        ?>
                        <div class="etn-col-md-6 etn-col-lg-<?php echo esc_attr( apply_filters( 'etn_event_archive_column', '4' ) ); ?>">

                            <div class="etn-event-item">

                                <?php do_action( 'etn_before_event_archive_content', get_the_ID(  ) ); ?>

                                <!-- content start-->
                                <div class="etn-event-content">

                                    <?php do_action( 'etn_before_event_archive_title', get_the_ID(  ) ); ?>

                                    <h3 class="etn-title etn-event-title">
                                        <a href="<?php echo esc_url(get_the_permalink()) ?>">
                                            <?php echo esc_html(get_the_title()); ?>
                                        </a>
                                    </h3>

                                    <?php do_action( 'etn_after_event_archive_title', get_the_ID(  ) ); ?>
                                </div>
                                <!-- content end-->

                                <?php do_action( 'etn_after_event_archive_content', get_the_ID(  ) ); ?>

                            </div>
                            <!-- etn event item end-->
                        </div>
                    <?php
                    }

                } else {
                    status_header( 404 );
                    include_once  ETN_PLUGIN_TEMPLATE_DIR . 'etn-404.php';
                    ?>
                        <p><?php echo esc_html__('No Event found!', 'eduker'); ?></p>
                    <?php
                }
                wp_reset_postdata();     
            }else if( is_archive() ) {

                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();

                        ?>
                        <div class="etn-col-md-6 etn-col-lg-<?php echo esc_attr( apply_filters( 'etn_event_archive_column', '4' ) ); ?>">

                            <div class="etn-event-item">

                                <?php do_action( 'etn_before_event_archive_content', get_the_ID(  ) ); ?>

                                <!-- content start-->
                                <div class="etn-event-content">

                                    <?php do_action( 'etn_before_event_archive_title', get_the_ID(  ) ); ?>

                                    <h3 class="etn-title etn-event-title">
                                        <a href="<?php echo esc_url(get_the_permalink()) ?>">
                                            <?php echo esc_html(get_the_title()); ?>
                                        </a>
                                    </h3>

                                    <?php do_action( 'etn_after_event_archive_title', get_the_ID(  ) ); ?>
                                </div>
                                <!-- content end-->

                                <?php do_action( 'etn_after_event_archive_content', get_the_ID(  ) ); ?>

                            </div>
                            <!-- etn event item end-->
                        </div>
                    <?php
                        
                    }
                } else {
                    status_header( 404 );
                    include_once  ETN_PLUGIN_TEMPLATE_DIR . 'etn-404.php';
                }
                // Restore original Post Data
                wp_reset_postdata();     
            }        
                ?>
                <?php do_action( 'etn_after_event_archive_item' ); ?>

            </div>

            <?php 
            if( isset( $query ) && !empty( $query )  ) {
                do_action( 'etn_event_archive_pagination', $query );
            }else{
                do_action( 'etn_event_archive_pagination' );
            }
            ?>
        
        </div>
    </div>
</div>

<?php do_action( 'etn_after_event_archive_container' ); ?>