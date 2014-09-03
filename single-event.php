<?php
/**
 * The template for displaying a single event
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */


//Call the template header
get_header(); ?>

<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php twentyfourteen_post_thumbnail(); ?>
      <header class="entry-header">
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <div class="entry-meta">
          <?php
        
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
        ?>
          <span class="comments-link">
          <?php comments_popup_link( __( 'Leave a comment', 'sgcampus' ), __( '1 Comment', 'sgcampus' ), __( '% Comments', 'sgcampus' ) ); ?>
          </span>
          <?php
        endif;

        edit_post_link( __( 'Edit', 'sgcampus' ), '<span class="edit-link">', '</span>' );
        ?>
        </div>
        <!-- .entry-meta -->
        <?php 
        if ( is_single() ) : ?>
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style" style="float: right;"> <a class="addthis_button_facebook_share" fb:share:layout="button_count" style="margin-right: 15px; line-height: 1;"></a> <a class="addthis_button_tweet" tw:via="sgcampus" style="margin-right:-10px;"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium" style="margin-right:-15px;"></a> <a class="addthis_button_linkedin_counter" style="margin-right: 10px;"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true, ui_language: "es" };</script> 
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5100717127708e7f"></script> 
        <!-- AddThis Button END -->
        <?php 
        endif;
        ?>
      </header>
      <!-- .entry-header -->
      
      <div class="entry-content single"> 
        <!-- Get event information, see template: event-meta-event-single.php -->
        <?php eo_get_template_part('event-meta','event-single'); ?>
        
        <!-- The content or the description of the event-->
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sgcampus' ) ); ?>
      </div>
      <!-- .entry-content -->
      
      <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
      
    </article>
    <!-- #post-<?php the_ID(); ?> --> 
    
    <!-- If comments are enabled, show them -->
    <div class="comments-template">
      <?php comments_template(); ?>
    </div>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- #content --> 
</div>
<!-- #primary --> 

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
