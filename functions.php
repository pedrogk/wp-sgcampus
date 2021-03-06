<?php
// Add your theme specific functions here

function list_events_in_home_loop( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'event') );
  return $query;
}
add_filter( 'pre_get_posts', 'list_events_in_home_loop' );

function sgcampus_textdomain_setup() {
	load_child_theme_textdomain( 'sgcampus',  get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'sgcampus_textdomain_setup' );

function sgcampus_meta_time() {
  if ( is_sticky() && is_home() && ! is_paged() ) {
    echo '<span class="featured-post">' . __( 'Sticky', 'sgcampus' ) . '</span>';
  }

  $timestampStr = esc_attr( get_the_date('c') );
  $dateStr = esc_html( get_the_date() );
  $permalink =  esc_url( get_permalink() );
  
  if ( get_post_type() == 'event')
    $dateStr = eo_get_schedule_start('d-M-Y H:i');
  
  print "<span class='entry-date'><a href='$permalink' rel='bookmark'><time class='entry-date' datetime='$timestampStr'>$dateStr</time></a></span>";

}

?>
