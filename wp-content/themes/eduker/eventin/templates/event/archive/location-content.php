<?php
defined( 'ABSPATH' ) || die();

$etn_event_location = get_post_meta( get_the_ID(), 'etn_event_location', true );

$location = '';
$loc_arr = $etn_event_location;

if(!empty(is_array($loc_arr) || is_object($loc_arr))) : 
foreach ($loc_arr as $key => $loc) {
    if ( $key == 'address' ) {
    $location .= $loc;
    } elseif ( $key == 'custom_url' ) {
        $location .= $loc;
    }
}
endif; 
if(!empty($location)) : 
?>
<div class="etn-event-location">
    <i class="etn-icon etn-location"></i> 
    <?php echo esc_html($location); ?>
</div>
<?php endif; ?>