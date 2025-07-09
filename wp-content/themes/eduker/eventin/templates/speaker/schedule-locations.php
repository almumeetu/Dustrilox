<?php
defined( 'ABSPATH' ) || exit;

if( !empty( $etn_shedule_room ) ){
    ?>
    <span class="etn-schedule-location">
        <i class="etn-icon etn-location"></i> <?php echo esc_html( $etn_shedule_room ); ?>
    </span>
    <?php
}