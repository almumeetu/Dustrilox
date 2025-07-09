<?php

use \Etn\Utils\Helper;
use Etn\Templates\Event\Parts\EventDetailsParts;

defined( 'ABSPATH' ) || exit;

$event_options  = get_option("etn_event_options");

EventDetailsParts::event_single_organizers( $etn_organizer_events );