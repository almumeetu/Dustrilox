<?php
defined('ABSPATH') || die();
?>
<div class="etn-single-event-attendee-btn">
    <a target="_blank" rel="noopener" href="<?php echo esc_url( get_post_meta( $single_event_id, "attende_page_link", true ) ); ?>" class="etn-single-event-attendee-btn-text">
        <i class="etn-icon etn-calendar"></i> 
        <?php 
        $attendee_list_btn_text = apply_filters( 'etn_event_attendee_list_buttn_text', esc_html__("ATTENDEE LIST", "eduker") );
        echo esc_html( $attendee_list_btn_text );?>
    </a>
</div>