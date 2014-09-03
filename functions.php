<?php
// Add your theme specific functions here

function list_events_in_home_loop( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'event') );
  return $query;
}
add_filter( 'pre_get_posts', 'list_events_in_home_loop' );

?>